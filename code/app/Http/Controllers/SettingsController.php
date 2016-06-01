<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 01/06/2016
 * Time: 10:18
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class SettingsController extends Controller
{
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
        $user->password = Input::get('password');
        $confirmPassword = Input::get('confirmPassword');
        
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
}