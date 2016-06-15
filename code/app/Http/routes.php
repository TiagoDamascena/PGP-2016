<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

\Route::get('/', function () {
    if (Auth::check()){
        return redirect(url('/home'));
    }
    $loginError = null;
    return view('Login',compact('loginError'));
});

\Route::get('/register', function () {
    if (Auth::check()){
        return redirect(url('/home'));
    }
    $newUserError = null;
    return view('Register', compact('newUserError'));
});

\Route::get('/home', function (){
    if (Auth::check()){
        return view('Home');
    }
    return redirect(url('/userNotLogged'));
});

\Route::get('/settings', function (){
    if (Auth::check()){
        $settingsFeedback = null;
        return view('Settings', compact('settingsFeedback'));
    }
    return redirect(url('/userNotLogged'));
});

\Route::get('/schedule', 'ScheduleController@index');

\Route::get('/getYears', 'ScheduleController@getYears');

\Route::get('/getTerms/{yearId}', 'ScheduleController@getTerms');

\Route::get('/subject/{subject_id}', function ($subject_id){
    if (Auth::check()){
        $subject = \App\Subject::where('id',$subject_id)->first();
        if(!$subject) {
            return redirect(url('/home'));
        } else {
            $subjectFeedback = null;
            return view('Subject', compact('subject','subjectFeedback'));
        }
    }
    return redirect(url('/userNotLogged'));
});

\Route::get('/recoveryPassword/{unique_key}',function ($unique_key){

    if(!\App\Change_password::where('unique_key',$unique_key)->first()){
        die('Recovery Password - User not Found');
    }
    $errorRecoveryPassword = null;
    return view('RecoveryPassword',compact('unique_key','errorRecoveryPassword'));
});

\Route::get('/newUser','LoginController@newUser');

\Route::get('/loginUser','LoginController@loginAuthenticate');

\Route::get('/logout','LoginController@endSession');

\Route::get('/userNotLogged','LoginController@userNotLogged');

\Route::get('/changeName','SettingsController@changeName');

\Route::get('/changeEmail','SettingsController@changeEmail');

\Route::get('/changePassword','SettingsController@changePassword');

\Route::get('/deleteUser','SettingsController@delete');

\Route::get('/newSchoolYear', 'ScheduleController@createSchoolYear');

\Route::get('/newSchoolTerm/{yearID}', 'ScheduleController@createSchoolTerm');

\Route::get('/newSubject/{schoolTermID}', 'ScheduleController@createSubject');

\Route::get('/newSchedule/{subject_id}', 'SubjectController@createSchedule');

\Route::get('/newTask/{subject_id}', 'SubjectController@createTask');

\Route::get('/newExam/{subject_id}', 'SubjectController@createExam');

Route::get('/requestRecoveryPassword','LoginController@forgotPassword');

Route::get('/passwordChanged/{unique_key}','SettingsController@recoverPassword');

Route::get('/fbLogin', 'FBAuthController@login');
Route::get('/fbCallback', 'FBAuthController@callback');
Route::get('/fbInputPassword/{userEmail}', 'FBAuthController@register');