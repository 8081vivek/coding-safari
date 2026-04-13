<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\CourseCategory;
use App\Models\question_tbl;
use App\Models\student_tbl;
use App\Models\assesment_tbl;
use App\Models\QuizAttempt;



class AdminController extends Controller
{

public function login(Request $request)
{
    $email = $request->email;
    $password = $request->password;

    $data = AdminModel::where('email', $email)
        ->orWhere('mobile', $email)
        ->first();

    if (!$data) {
        return redirect('Admin')->with('error', "Admin Data Not Found");
    }

    if ($data->password != $password) {
        return redirect('Admin')->with('error', "Your Password is wrong. Please try again");
    }
    $request->session()->put("admin",$email);
    return redirect('dashboard/')->with('success', "Admin Login Successfully");
}

public function logout(Request $request)
{
    $request->session()->forget('admin');   
    $request->session()->flush();            

    return redirect('Admin')->with('success', 'Logout Successfully');
}
public function dashboard(Request $r)
{
    // Basic data
    $data = CourseCategory::all();
    $dataQuestion = question_tbl::all();
    $dataStudent = student_tbl::all();

    // Filters
    $filter = $r->filter;
    $filterDate = $r->filterDate;

    // Course mapping
    $courseIds = $dataQuestion->pluck('course_id');
    $course = CourseCategory::whereIn('course_id', $courseIds)->get();

    $assesmentShow = assesment_tbl::all();

    if(session()->has('admin')) {

        $email = session()->get('admin');
        $adminData = AdminModel::where('email', $email)->first();

        // ✅ SAFE: assessment check
        $assesmentData = assesment_tbl::first();

        if ($assesmentData) {
            $questionIds = explode(',', $assesmentData->questionId);
            $questions = question_tbl::whereIn('question_id', $questionIds)->get();
        } else {
            $questions = collect(); // empty
        }

        // ✅ FILTER QUERY
        $query = QuizAttempt::query();

        if (!empty($filter)) {
            $query->where('course', 'LIKE', '%' . $filter . '%');
        }

        if (!empty($filterDate)) {
            $query->whereDate('created_at', $filterDate);
        }

        // ✅ RESULT
        $result = $query->orderBy('score', 'desc')->get();

        return view('admin_dashboard', compact(
            'data',
            'dataQuestion',
            'course',
            'adminData',
            'dataStudent',
            'assesmentShow',
            'assesmentData',
            'questions',
            'result'
        ));
    }
    else{
        return redirect('Admin');
    }
}


function showquestion(Request $r, $encryptedId)
{
    try {
        $id = Crypt::decrypt($encryptedId);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Invalid ID');
    }

    $data = CourseCategory::all();
    $dataQuestion = question_tbl::all();
    $dataStudent = student_tbl::all();

    $courseIds = $dataQuestion->pluck('course_id');
    $course = CourseCategory::whereIn('course_id', $courseIds)->get();
    $assesmentShow = assesment_tbl::all();

    if(session()->has('admin')){
        $email = session()->get('admin');
        $adminData = AdminModel::where('email', $email)->first();

        // 🔥 YAHAN encrypted ID ka use ho raha hai
        $assesmentData = assesment_tbl::where('id', $id)->first();

        if(!$assesmentData){
            return redirect()->back()->with('error', 'Assessment not found');
        }

        $questionIds = explode(',', $assesmentData->questionId);
        $questions = question_tbl::whereIn('question_id', $questionIds)->get();

        $result = QuizAttempt::all()->sortByDesc('score');   

        return view('admin_dashboard', compact(
            'questions','result','data','dataQuestion',
            'course','adminData','dataStudent',
            'assesmentShow','assesmentData'
        ));
    } else {
        return redirect('Admin');
    }
}
}
