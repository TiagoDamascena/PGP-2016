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
    $loginError = null;
    return view('Login',compact('loginError'));
});

\Route::get('/registerUser', function () {
    $newUserError = null;
    return view('Register', compact('newUserError'));
});

\Route::get('/home', function (){
    if (Auth::check()){
        return view('Home');
    }
    return redirect(url('/userNotLogged'));
});

\Route::get('/newUser','LoginController@newUser');

\Route::get('/loginUser','LoginController@loginAuthenticate');

\Route::get('/logout','LoginController@endSession');

\Route::get('/userNotLogged','LoginController@userNotLogged');

\Route::get('/settings','SettingsController@load');

\Route::get('/deleteUser','SettingsController@delete');

