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
    public function delete(){
        $user = \Auth::user();
        $user->delete();
        return redirect(url('/'));
    }
}