<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 19/05/2016
 * Time: 00:06
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function loginAuthenticate()
    {
        $password = Input::get('password');
        $email = Input::get('email');
        $user = User::where('email',$email)->first();
        $loginError = null;
        
        if(!$user){
            $loginError = 'email_not_found';
        }
        if($user->password != $password){
            $loginError = 'wrong_password';
        }
        if($loginError){
            return view('Login',compact('loginError'));
        }
        \Auth::login($user,true);
        return redirect(url('/home'));
    }

    public function newUser()
    {
        $newUserError = null;
        
        $user = new User();
        $user->name = Input::get('nome');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $confirmPassword = Input::get('confirmPassword');
        
        if ($user->password == $confirmPassword) {
            $user->save();
            \Auth::login($user,true);
            return redirect(url('/home'));
        }
        else {
            $newUserError = 'password_differently';
            return view('NewUser',compact('newUserError'));
        }
    }
}
