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
    $newUserError = true;
    return view('RegisterUser', compact('newUserError'));
});

\Route::get('/home', function (){
    return view('Menu');
});

\Route::get('/newUser','LoginController@newUser');

\Route::get('/loginUser','LoginController@loginAuthenticate');

\Route::get('/deleteUser','HomeController@delete');

\Route::get('/logout','HomeController@endSession');
