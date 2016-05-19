<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 19/05/2016
 * Time: 00:06
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function loginAuthenticate()
    {

        $email = Input::get('email');
        $password = Input::get('password');

        $results = DB::select('select password from users where email = $email');

        return $results == $password ? redirect(url('/home')) : redirect(url('/errorLogin'));
    }

    public function cadastro()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $name = Input::get('nome');
        $confirmPassword = Input::get('confirmPassword');

        $results=false;

        if ($password == $confirmPassword) {
            $results = DB::insert('insert into users (name, password, email) values ($name,$password,$email)');
        }

        return $results ? redirect(url('/home')) : redirect(url('/errorLogin'));
    }
}
