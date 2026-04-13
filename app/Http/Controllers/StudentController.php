<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student_tbl;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\StudentController;

class StudentController extends Controller
{

 public function register(){
    return view('register');
 }

 public function otpPage(Request $r){

     $sessionOtp  = $r->session()->get('otp');
    $sessionRotp = $r->session()->get('rotp'); 

    if ($sessionOtp || $sessionRotp) {
    $email = $r->session()->get('otp_email');

        $dataShow = student_tbl::where('email', $email)->first();
        return view('otpVerification',compact('dataShow'));

    }
    else{
        return redirect('student@vpregister')->with('error',"You do Not direct Access");
    }
 }


    public function studentRegister(Request $r)
{
    $r->validate([
        'collegeId' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        'email' => 'required|email',
    ]);

    $file = $r->file('collegeId');
    $filename = $file->getClientOriginalName();

    $email=$r->email;
    $mobile=$r->phone;
    $checkData=student_tbl::where('email', $email)->orwhere('mobile',$mobile)->first();
    if($checkData){
        return redirect('student@vpregister')->with('error',"This Condidate Already Registered please not use same number and same email in registration ");
    }

    $data = new student_tbl();
    $data->name = $r->firstName;
    $data->email = $r->email;
    $data->mobile = $r->phone;
    $data->dob = $r->dob;
    $data->password=$r->password;   
     $data->gender = $r->gender;
    $data->address = $r->address;
    $data->collegeName = $r->college;
    $data->course = $r->course;
    $data->year = $r->year;
    $data->enrollment = $r->enrollment;
    $data->domain = $r->domain;
    $data->collegeId = $filename;

    $file->move(public_path("image/"), $filename);

$data->now = now()->setTimezone('Asia/Kolkata')->format('Y-m-d h:i:s A');
    $data->status = "pending";
    $data->registrationId="";

   
    $data->save();

 
    $data->registrationId = 'CSH' . str_pad($data->id, 4, '0', STR_PAD_LEFT);
    $data->save();

  
    $otp = random_int(100000, 999999);

    session([
        'otp' => $otp,
        'otp_email' => $r->email,
        'otp_expire' => now()->addMinutes(2)
    ]);

    
    try {
        Mail::send('mail.otp', ['otp' => $otp], function ($message) use ($r) {
            $message->to($r->email)->subject('Student Registration OTP');
        });
    } catch (\Exception $e) {
     
    }


return redirect("OtpPageSendYou")->with("success","A Otp send On your Email for Email verification ") ;

}



       public function otpVerifyPage(Request $r){
    $email = $r->session()->get('otp_email');

    if (!$email) {
        return redirect()->back()->with('error', 'Session expired. Please try again.');
    }

    $sessionOtp  = $r->session()->get('otp');
    $sessionRotp = $r->session()->get('rotp'); 

    if ($r->otp == $sessionOtp || $r->otp == $sessionRotp) {

        $student = student_tbl::where('email', $email)->first();

        if ($student) {
            $student->status = "Active";
            $student->save();
        }

        $r->session()->forget(['otp', 'rotp', 'otp_email']);

        return redirect('student@vp@login')->with('success', 'OTP verified successfully!');
    }
    $dataShow = student_tbl::where('email', $email)->first();

return redirect("OtpPageSendYou")
       ->with('error', 'Invalid OTP. Please enter the correct verification code.');

}

public function resendOtp(Request $r)
{
    $email = $r->session()->get('otp_email');

    if (!$email) {
        return redirect('studentregister')
               ->with('error', 'Session expired. Please register again.');
    }

    $otp = random_int(100000, 999999);

   $r->session()->put('rotp', $otp);
    $r->session()->put('otp_email', $email);
    $r->session()->put('otp_expire', now()->addMinutes(2));

    try {
        Mail::send('mail.otp', ['otp' => $otp], function ($message) use ($email) {
            $message->to($email)->subject('Student Registration OTP');
        });
    } catch (\Exception $e) {
        return redirect("OtpPageSendYou")
               ->with('error', 'Failed to send OTP. Please try again.');
    }

    return redirect("OtpPageSendYou")
           ->with('success', 'A new OTP has been sent to your email.');
}


public function login_code(Request $r){
$login = $r->login_id;

$data = student_tbl::where('email', $login)
        ->orWhere('registrationId', $login)
        ->orWhere('mobile', $login)
        ->first();  
  if($data){
if($r->password === $data->password){
    $r->session()->put('student',$login);
    return redirect('assessment_login/80/vp/clvp');
}
else{
    return redirect('student@vp@login')->with('error',"Password wrong please enter correct password");
}
    }
    else{
        return redirect('student@vp@login')->with('error',"Your data not found.please register your account");
    }
}

public function assesment_login(){
    if(session()->has('student')){
        $login=session()->get('student');
        $data = student_tbl::where('email', $login)
        ->orWhere('registrationId', $login)
        ->orWhere('mobile', $login)
        ->first();  
    return view('assessment_login',compact('data'));
    }else{
        return redirect('student@vp@login')->with("error","You do not direct access this page");
    }

}

    }