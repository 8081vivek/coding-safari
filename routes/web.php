<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('b','background');
Route::view("h",'home');
Route::view("Admin","admin_login");
Route::view("student@vp@login","student_login");
Route::view("q","add_question");
Route::view('student','student_dashboard');
Route::view("p","p");
Route::view('category','category');
Route::view("otp","otpVerification");
Route::controller(AdminController::class)->group(function(){

Route::post("admin@vp@login","login");
Route::get("1@logout%$","logout")->name('logout');
Route::post("dashboard","dashboard");
Route::get("dashboard","dashboard");
Route::get("showquestion1/Assesment/8081/{id}","showquestion")->name('admin.showquestion');;
Route::get("showquestion1/Assesment/8081/{id}","showquestion")->name('admin.showquestion');;
});

Route::controller(QuizController::class)->group(function () {
    Route::post('course',"course");
Route::post('quiz/vp8081/add','addQuestion')->name('quiz.add.store');

Route::get('quiz/vp8081/add/{id}','quizform')
    ->name('quizvp8081add');

    Route::get('setAssesment/vp/8081','setAssesment');
    Route::post('assesment_code/86454/afdj','assesment_code');
    Route::get('deleteAssesment/{id}','deleteAssesment');
    Route::get('statusActivation/{id}','activate');
    Route::get('deleteQuestion/{id}','deleteQuestion');
    Route::get('editQuestion/{id}','editQuestionView');
    Route::post('updateQuestion','UpdateQuestion');

Route::post('quiz/show/vp8081', 'show')->name('quiz/show/vp8081');
Route::get('/quiz/success/{attempt}','success')->name('successAssessment');
Route::post('/quiz/{code}/submit', 'submit')->name('quiz.submit');
Route::get('/certificate/{id}',  'certificate')->name('certificate.view');

});
Route::controller(AdminController::class)->group(function(){
    Route::post("otp/Page/get/241303",'otpVerifyPage');
});

Route::controller(StudentController::class)->group(function(){
    Route::post("studentregister","studentRegister")->name('studentregister');
    Route::get("student@vpregister","register")->name('student@vpregister');
    Route::get("OtpPageSendYou",'otpPage');
    Route::get('resendOtp','resendOtp');
    Route::post("otp@vpVerificationPage","otpVerifyPage");
    Route::post("login_code/8081/vp/login/student",'login_code')->name('login_code/8081/vp/login/student');
    Route::get("assessment_login/80/vp/clvp",'assesment_login')->name('assessment_login/80/vp/clvp');

});