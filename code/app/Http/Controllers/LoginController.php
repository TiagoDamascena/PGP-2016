<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 19/05/2016
 * Time: 00:06
 */

namespace App\Http\Controllers;

use App\Change_password;
use App\Jobs\Sender;
use App\User;
use Illuminate\Support\Facades\Input;
class LoginController extends Controller
{
    public function indexLogin(){
        if (\Auth::check()){
            return redirect(url('/home'));
        }
        $loginError = null;
        return view('Login',compact('loginError'));
    }

    public function indexRegister(){
        if (\Auth::check()){
            return redirect(url('/home'));
        }
        $newUserError = null;
        return view('Register', compact('newUserError'));
    }

    public function indexRecovery($unique_key){
        if(!Change_password::where('unique_key',$unique_key)->first()){
            die('Recovery Password - User not Found');
        }
        $errorRecoveryPassword = null;
        return view('RecoveryPassword',compact('unique_key','errorRecoveryPassword'));
    }
    
    public function loginAuthenticate()
    {
        $password = hash('sha256', Input::get('password'));
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
        $user->password = hash('sha256', Input::get('password'));
        $user->creationDate = date("Y-m-d H:i:s");
        $confirmPassword = hash('sha256', Input::get('confirmPassword'));
        
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
            $loginError = 'errorForgotPassword';
           return view('Login', compact('loginError'));
        }
        $sender = new Sender();
        $sender->send($user);

        $loginError = 'email_sent';
        return view('Login',compact('loginError'));
    }
    

}
