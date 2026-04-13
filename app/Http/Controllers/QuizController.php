<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\question_tbl;
use App\Models\assesment_tbl;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class QuizController extends Controller

{
public function quizform(Request $request, $id)
{
    if (!session()->has('admin')) {
        return redirect('Admin')->with('error', 'You do not have access');
    }
            $id = Crypt::decrypt($id);


    $data = CourseCategory::where("course_id",$id)->first();
$result = QuizAttempt::all()->sortByDesc('score');   
    return view('add_question', compact('data','result'));
}

public function setAssesment(Request $request){
if(session()->has('admin')){
    $dataQuestion = question_tbl::all();
        $courseIds = $dataQuestion->pluck('course_id');
          $course = CourseCategory::whereIn('course_id', $courseIds)->get();


    return view("setassesment",compact( 'dataQuestion', 'course'));
}else{
    return redirect('Admin');
}

}





   public function course(Request $request)
{
    $name = strtoupper($request->name);

    $exists = CourseCategory::where('name', $name)->exists();

    if ($exists) {
        return redirect('dashboard')
            ->with('error', 'This Course Already Exists');
    }

    $data = new CourseCategory();
    $data->name = $name;
    $data->course_icon = $request->course_icon;
    $data->description = $request->description;
    $data->save();

    return redirect('dashboard')
        ->with('success', 'Course Added Successfully');
}


function addQuestion(Request $r){

$dataCheck=question_tbl::where("question_name",$r->name)->first();
if($dataCheck){
return back()->with('error', 'This Question already in you file');
}
    $data=new question_tbl();
    $data->question_name=$r->name;
    $data->option_a=$r->option_a;
    $data->option_b=$r->option_b;
    $data->option_c=$r->option_c;
    $data->option_d=$r->option_d;
    $data->course_id=$r->course_id;
    $data->correct_option=$r->correct_option;
    $data->save();
return back()->with('success', 'Question add Successfully');
}




function assesment_code(Request $request){
    $data=new assesment_tbl();
$data->code=$request->code;
$data->title=$request->title;
$data->minutes=$request->minutes;
$data->seconds=$request->seconds;
$data->hours=$request->hours;
$data->questionId=implode(',',$request->questionId);
$data->Date_Time=now();
$data->save();
return redirect()->back()->with('success', 'Assessment Created Successfully');}

    public function show(Request $r)
    {
        $course = $r->code;

        session([
            'quiz_user' => [
                'name'    => $r->name,
                'email'   => $r->email,
                'mobile'  => $r->mobile,
                'college' => $r->college,
                'branch'  => $r->branch,
            ]
        ]);

        $assessment = assesment_tbl::where('code', $course)->first();

        if (!$assessment) {
            return redirect('../assessment_login/80/vp/clvp')
                ->with('error', "Assesment code is wrong");
        }
        if($assessment->status!="Active"){
            return redirect('../assessment_login/80/vp/clvp')
                ->with('error', "Assesment Not Set At This Time ");
        }

        $ids = collect(explode(',', (string) $assessment->questionId))
            ->map(fn ($v) => trim($v))
            ->filter()
            ->map(fn ($v) => (int) $v)
            ->unique()
            ->values();

        $questions = question_tbl::whereIn('question_id', $ids)
            ->get()
            ->keyBy('question_id');

        $orderedQuestions = $ids->map(fn ($id) => $questions->get($id))->filter();

        $quizData = $orderedQuestions->map(function ($q) {
            return [
                "id"       => $q->question_id,
                "question" => $q->question_name,
                "category" => $q->course_id,
                "options"  => [
                    ["id" => "A", "text" => $q->option_a, "correct" => $q->correct_option === "A"],
                    ["id" => "B", "text" => $q->option_b, "correct" => $q->correct_option === "B"],
                    ["id" => "C", "text" => $q->option_c, "correct" => $q->correct_option === "C"],
                    ["id" => "D", "text" => $q->option_d, "correct" => $q->correct_option === "D"],
                ],
            ];
        })->values();

        $timeLimitSeconds = ((int) $assessment->minutes * 60) + (int) $assessment->seconds;

        return view('quiz', compact('quizData', 'assessment', 'timeLimitSeconds'));
    }

   public function submit(Request $request, $code)
{
    $answers = $request->input('answers', []);
    $user = session('quiz_user', []);

    $name    = $user['name']    ?? null;
    $email   = $user['email']   ?? null;
    $mobile  = $user['mobile']  ?? null;
    $college = $user['college'] ?? null;
    $branch  = $user['branch']  ?? null;

    $questionIds = collect($answers)->pluck('question_id')->filter()->unique()->values();

    $correctMap = DB::table('question_tbls')
        ->whereIn('question_id', $questionIds)
        ->pluck('correct_option', 'question_id');

    $score = 0;

    $finalAnswers = collect($answers)->map(function ($a) use ($correctMap, &$score) {
        $qid      = $a['question_id'] ?? null;
        $selected = $a['selected'] ?? null;

        $correctOption = $qid ? ($correctMap[$qid] ?? null) : null;
        $isCorrect = ($correctOption !== null && $selected !== null && $selected === $correctOption);

        if ($isCorrect) $score++;

        return [
            'question_id'    => $qid,
            'selected'       => $selected,
            'correct_option' => $correctOption,
            'is_correct'     => $isCorrect,
        ];
    })->values()->toArray();

    $attempt = QuizAttempt::create([
        'course'  => $code,
        'answers' => json_encode($finalAnswers),
        'score'   => $score,
        'name'    => $name,
        'email'   => $email,
        'mobile'  => $mobile,
        'college' => $college,
        'date'    => now('Asia/Kolkata'),
        'branch'  => $branch,
    ]);

    
   session()->forget('quiz_user');  // ✅ return se pehle

return response()->json([
    'ok' => true,
    'message' => 'Assessment completed',
    'score' => $score,
    'attempt_id' => $attempt->id,
    'redirect_url' => route('successAssessment', [
        'attempt' => Crypt::encrypt($attempt->id)
    ]),
]);
}

public function success($attempt)
{
    $id = Crypt::decrypt($attempt); // decrypt here
    $attempt = QuizAttempt::findOrFail($id);

    return view('success', compact('attempt'));
}





public function certificate($id)
{
    try {
        $id = Crypt::decrypt($id);
    } catch (\Exception $e) {
        abort(404);
    }

    $attempt = QuizAttempt::findOrFail($id);

    return view('certificate', compact('attempt'));
}


public function deleteAssesment(Request $request,$id){
    $id=Crypt::decrypt($id);
  $data=assesment_tbl::find($id);
      if (!$data) {
        return redirect()->back()->with('error', 'Record not found');
    }

    $data->delete();
echo "Data deleted";
    return redirect()->back()->with('success', 'Deleted successfully');


}





public function activate(Request $r, $id)
{
    $id = Crypt::decrypt($id);

    $data = assesment_tbl::find($id);

    if (!$data) {
        return redirect()->back()->with('error', 'Record not found');
    }
    if ($data->status == "Active") {
        $data->status = "Deactive";
    } else {
        $data->status = "Active";
    }

    $data->save();

    return redirect()->back()->with('success', 'Status updated successfully');
}



public function deleteQuestion(Request $r, $id)
{
    $id = Crypt::decrypt($id);

    $data = question_tbl::where('question_id',$id)->first();

    if (!$data) {
        return redirect()->back()->with('error', 'Question not found');
    }

    $data->delete();

    return redirect()->back()->with('success', 'Question deleted successfully');
}



public function editQuestionView(Request $r, $id)
{
    if (session()->has('admin')) {

        $id = Crypt::decrypt($id);

        $data = question_tbl::where('question_id', $id)->first();
        $courseData=CourseCategory::where('course_id',$data->course_id)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Question not found');
        }

        return view('editquestion', compact('data','courseData'));
    } else {
        return redirect()->back()->with('error', 'Unauthorized access');
    }
}

public function UpdateQuestion(Request $r)
{
    $questionId = $r->question_id;

    $data = question_tbl::where('question_id', $questionId)->first();
    

    if (!$data) {
        return redirect()->back()->with('error', 'Question not found');
    }
    $data->question_name = $r->name;
    $data->option_a = $r->option_a;
    $data->option_b = $r->option_b;
    $data->option_c = $r->option_c;
    $data->option_d = $r->option_d;
    $data->correct_option = $r->correct_option;

    $data->save();

    return redirect()->back()->with('success', 'Question updated successfully');
}


}


