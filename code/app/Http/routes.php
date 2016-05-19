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
    $login = true;
    return view('Login', compact('login'));
});

\Route::get('/errorLogin', function () {
    $login = false;
    return view('Login', compact('login'));
});

\Route::get('/login','LoginController@loginAuthenticate');
\Route::get('/home','HomeController@index');
