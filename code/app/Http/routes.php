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

\Route::get('/newUser','LoginController@newUser');

\Route::get('/loginUser','LoginController@loginAuthenticate');

\Route::get('/logout','LoginController@endSession');

\Route::get('/userNotLogged','LoginController@userNotLogged');

\Route::get('/changeName','SettingsController@changeName');

\Route::get('/changeEmail','SettingsController@changeEmail');

\Route::get('/changePassword','SettingsController@changePassword');

\Route::get('/deleteUser','SettingsController@delete');

