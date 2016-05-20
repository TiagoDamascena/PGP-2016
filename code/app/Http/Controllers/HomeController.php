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
        $email = Input::get('email');
        $user = User::where('email', $email)->first();
        $user->delete();
        $this->endSession();
    }

    public function endSession(){
        \Auth::logout();
        return view('Login');
    }
    
}
