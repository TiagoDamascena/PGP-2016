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

\Route::get('/', 'LoginController@indexLogin');

\Route::get('/register', 'LoginController@indexRegister');

\Route::get('/recoveryPassword/{unique_key}','LoginController@indexRecovery');

\Route::get('/home', 'HomeController@indexHome');

\Route::get('/settings', 'SettingsController@indexSettings');

\Route::get('/schedule', 'ScheduleController@indexSchedule');

\Route::get('/subject/{subject_id}', 'SubjectController@indexSubject');

\Route::get('/subject/getSchedule/{subjectId}', 'SubjectController@getSchedule');

\Route::get('/subject/getTasks/{subjectId}', 'SubjectController@getTasks');

\Route::get('/subject/getExams/{subjectId}', 'SubjectController@getExams');

\Route::get('/subject/editSchedule/{scheduleId}', 'SubjectController@editSchedule');

\Route::get('/getYears', 'ScheduleController@getYears');

\Route::get('/getTerms/{yearId}', 'ScheduleController@getTerms');

\Route::get('/getSubjects/{termId}', 'ScheduleController@getSubjects');

\Route::get('/newUser','LoginController@newUser');

\Route::get('/loginUser','LoginController@loginAuthenticate');

\Route::get('/logout','LoginController@endSession');

\Route::get('/userNotLogged','LoginController@userNotLogged');

\Route::get('/changeName','SettingsController@changeName');

\Route::get('/changeEmail','SettingsController@changeEmail');

\Route::get('/changePassword','SettingsController@changePassword');

\Route::get('/deleteUser','SettingsController@delete');

\Route::get('/newSchoolYear', 'ScheduleController@createSchoolYear');

\Route::get('/editSchoolYear/{yearId}', 'ScheduleController@editSchoolYear');

\Route::get('/newSchoolTerm/{yearID}', 'ScheduleController@createSchoolTerm');

\Route::get('/edtSchoolTerm/{termId}', 'ScheduleController@editSchoolTerm');

\Route::get('/newSubject/{schoolTermID}', 'ScheduleController@createSubject');

\Route::get('/newSchedule/{subject_id}', 'SubjectController@createSchedule');

\Route::get('/newTask/{subject_id}', 'SubjectController@createTask');

\Route::get('/newExam/{subject_id}', 'SubjectController@createExam');

Route::get('/requestRecoveryPassword','LoginController@forgotPassword');

Route::get('/passwordChanged/{unique_key}','SettingsController@recoverPassword');

Route::get('/fbLogin', 'FBAuthController@login');

Route::get('/fbCallback', 'FBAuthController@callback');

Route::get('/fbInputPassword/{userEmail}', 'FBAuthController@register');

Route::get('/schedule/deleteYear/{yearID}', 'ScheduleController@removeSchoolYear');

Route::get('/schedule/deleteTerm/{termID}', 'ScheduleController@removeSchoolTerm');