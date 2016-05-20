<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 19/05/2016
 * Time: 00:06
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class HomeController extends Controller
{

    public function delete(){
        $user = \Auth::user();
        $user->delete();
        return redirect(url('/'));
    }

    public function endSession(){
        \Auth::logout();
        return redirect(url('/'));
    }

    public function userNotLogged(){
        $loginError = 'user_not_logged';
        return view('Login',compact('loginError'));
    }
    
}
