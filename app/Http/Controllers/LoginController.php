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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller {

    public function indexLogin() {
        if (Auth::check()) {
            $response = redirect(url('/home'));
        } else {
            $loginError = null;
            $response = view('Login',compact('loginError'));
        }

        return $response;
    }

    public function indexRegister() {
        if (Auth::check()) {
            $response = redirect(url('/home'));
        } else {
            $newUserError = null;
            $response = view('Register', compact('newUserError'));
        }

        return $response;
    }

    public function indexRecovery($unique_key) {
        if (!Change_password::where('unique_key',$unique_key)->first()) {
            die('Recovery Password - User not Found');
        }

        $errorRecoveryPassword = null;
        $response = view('RecoveryPassword',compact('unique_key','errorRecoveryPassword'));
        return $response;
    }

    public function loginAuthenticate() {
        $password = hash('sha256', Input::get('password'));
        $email = Input::get('email');
        $user = User::where('email', $email)->first();
        $loginError = null;

        if (!$user) {
            $loginError = 'email_not_found';
            $response = view('Login',compact('loginError'));
        } else {
            if ($user->password != $password) {
                $loginError = 'wrong_password';
                $response = view('Login',compact('loginError'));
            } else {
                Auth::login($user,true);
                $response = redirect(url('/home'));
            }
        }

        return $response;
    }

    public function endSession() {
        Auth::logout();
        $response = redirect(url('/'));
        return $response;
    }

    public function userNotLogged() {
        $loginError = 'user_not_logged';
        $response = view('Login',compact('loginError'));
        return $response;
    }

    public function newUser() {
        $newUserError = null;

        $user = new User();
        $user->name = Input::get('nome');
        $user->email = Input::get('email');
        $user->password = hash('sha256', Input::get('password'));
        $user->creationDate = date("Y-m-d H:i:s");
        $confirmPassword = hash('sha256', Input::get('confirmPassword'));

        $compare = User::where('email', $user->email)->first();
        if ($compare) {
            $newUserError = 'user_already_exists';
            $response = view('Register',compact('newUserError'));
        } else {
            if ($user->password == $confirmPassword) {
                $user->save();
                Auth::login($user,true);

                $response = redirect(url('/home'));
            } else {
                $newUserError = 'password_differently';
                $response = view('Register',compact('newUserError'));
            }
        }

        return $response;
    }

    public function forgotPassword() {
        $email = Input::get('email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            $loginError = 'errorForgotPassword';
            $response = view('Login', compact('loginError'));
        } else {
            $sender = new Sender();
            $sender->send($user);

            $loginError = 'email_sent';
            $response = view('Login',compact('loginError'));
        }

        return $response;
    }
}
