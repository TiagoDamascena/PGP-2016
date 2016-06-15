<?php

namespace App\Http\Controllers;

use App\Change_password;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Socialite;

class FBAuthController extends Controller
{
    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $userFB = \Socialite::driver('facebook')->user();
        $user = User::where('email',$userFB->getEmail())->first();
        if (!$user){
            $user = new User();
            $user->name = $userFB->getName();
            $user->email = $userFB->getEmail();
            $user->creationDate = date("Y-m-d H:i:s");
            $user->password = $userFB->getId();
            $user->save();

            $insertPass = new Change_password();
            $insertPass->unique_key = (md5($user.date("Y-m-d H:i:s")));
            $insertPass->user = $user->id;
            $insertPass->save();

            $insertPass = $insertPass->unique_key;
            $errorFBloginPassword = "";
            return view('RegisterFB', compact('insertPass', 'errorFBloginPassword'));
        }
        else {
            \Auth::login($user,true);
            return redirect(url('/home'));
        }
    }

    public function register($insertPass) {
        $userId = Change_password::where('unique_key',$insertPass)->first();
        $user = User::where('id',$userId->user)->first();
        $user->password = Input::get('password');
        $confirmPassword = Input::get('confirmPassword');

        if ($user->password == $confirmPassword) {
            $user->save();
            $userId->delete();
            \Auth::login($user,true);
            return redirect(url('/home'));
        }
        else {
            $errorFBloginPassword = 'password_do_not_match';
            return view('RegisterFB', compact('insertPass', 'errorFBloginPassword'));
        }
    }
}
