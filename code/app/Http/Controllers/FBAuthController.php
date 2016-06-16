<?php

namespace App\Http\Controllers;

use App\Change_password;
use App\User;
use App\UserProfilePhoto;
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

            $photo = new UserProfilePhoto();
            $photo->user = $user->id;
            $photo->url = $userFB->getAvatar();
            $photo->save();
            
            $errorFBloginPassword = "";
            $userEmail = $user->email;
            return view('RegisterFB', compact('userEmail', 'errorFBloginPassword'));
        }
        else {
            \Auth::login($user,true);
            $photo = UserProfilePhoto::where('user', $user->id)->first();
            if($photo){
                $photo->url = $userFB->getAvatar();
                $photo->save();
            }
            else{
                $photo = new UserProfilePhoto();
                $photo->user = $user->id;
                $photo->url = $userFB->getAvatar();
                $photo->save();    
            }
            return redirect(url('/home'));
        }
    }

    public function register($userEmail) {
        $user = User::where('email',$userEmail)->first();
        $user->password = Input::get('password');
        $confirmPassword = Input::get('confirmPassword');

        if ($user->password == $confirmPassword) {
            $user->save();
            \Auth::login($user,true);
            return redirect(url('/home'));
        }
        else {
            $errorFBloginPassword = 'password_do_not_match';
            return view('RegisterFB', compact('user', 'errorFBloginPassword'));
        }
    }
}
