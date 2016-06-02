<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 19/05/2016
 * Time: 00:06
 */

namespace App\Http\Controllers;

use App\Jobs\Sender;
use App\User;
use Illuminate\Auth\Events\Login;
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
            return view('Login',compact('loginError'));
        }
        if($user->password != $password){
            $loginError = 'wrong_password';
            return view('Login',compact('loginError'));
        }
        \Auth::login($user,true);
        return redirect(url('/home'));
    }
    
    public function endSession(){
        \Auth::logout();
        return redirect(url('/'));
    }
    
    public function userNotLogged(){
        $loginError = 'user_not_logged';
        return view('Login',compact('loginError'));
    }
    
    public function newUser()
    {
        $newUserError = null;

        $user = new User();
        $user->name = Input::get('nome');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->creationDate = date("Y-m-d H:i:s");
        $confirmPassword = Input::get('confirmPassword');
        
        $compare = User::where('email',$user->email)->first();
        if($compare){
            $newUserError = 'user_already_exists';
            return view('Register',compact('newUserError'));
        }
        if ($user->password == $confirmPassword) {

            $user->save();
            \Auth::login($user,true);

            return redirect(url('/home'));
        }
        else {
            $newUserError = 'password_differently';
            return view('Register',compact('newUserError'));
        }
    }

    public function forgotPassword(){
        $email = Input::get('email');
        $user = User::where('email', $email)->first();
        if(!$user){
            die('Sem usuario');
            $loginError = 'errorForgotPassword';
           return view('ForgotPassword', compact('loginError'));
        }
        $sender = new Sender();
        $sender->send($user);

        $loginError = 'email_sent';
        return view('Login',compact('loginError'));
    }
    
    

}
