<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 01/06/2016
 * Time: 10:18
 */

namespace App\Http\Controllers;

use App\Change_password;
use App\User;
use Illuminate\Support\Facades\Input;


class SettingsController extends Controller
{
    public function indexSettings(){
            if (\Auth::check()){
                $settingsFeedback = null;
                return view('Settings', compact('settingsFeedback'));
            }
            return redirect(url('/userNotLogged'));
    }
    
    public function changeName() {
        $settingsFeedback = null;
        
        $user = \Auth::user();
        $user->name = Input::get('name');
        
        $user->save();
        
        $settingsFeedback = 'name_changed';
        return view('Settings',compact('settingsFeedback'));
    }
    
    public function changeEmail() {
        $settingsFeedback = null;
        
        $user = \Auth::user();
        $user->email = Input::get('email');
        $confirmEmail = Input::get('confirmEmail');
        
        if ($user->email == $confirmEmail) {
            $user->save();
            $settingsFeedback = 'email_changed';
        } else {
            $settingsFeedback = 'email_do_not_match';
        }
        
        return view('Settings',compact('settingsFeedback'));
    }
    
    public function changePassword() {
        $settingsFeedback = null;
        
        $user = \Auth::user();
        $user->password = hash('sha256',Input::get('password'));
        $confirmPassword = hash('sha256',Input::get('confirmPassword'));
        
        if ($user->password == $confirmPassword) {
            $user->save();
            $settingsFeedback = 'password_changed';
        } else {
            $settingsFeedback = 'password_do_not_match';
        }
        
        return view('Settings',compact('settingsFeedback'));
    }
    public function delete() {
        $user = \Auth::user();
        $user->delete();
        return redirect(url('/'));
    }


    public function recoverPassword($unique_key) {
        
        $userId = Change_password::where('unique_key',$unique_key)->first();
        $user = User::where('id',$userId->user)->first();
        $user->password = hash('sha256',Input::get('password'));
        $confirmPassword = hash('sha256',Input::get('confirmPassword'));

        if ($user->password == $confirmPassword) {
            $user->save();
            $userId->delete();
            \Auth::login($user,true);
            return redirect(url('/home'));
        }
        else {
            $errorRecoveryPassword = 'password_do_not_match';
            return view('RecoveryPassword',compact('unique_key','errorRecoveryPassword'));
        }
    }
}