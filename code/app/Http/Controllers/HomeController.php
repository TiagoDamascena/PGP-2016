<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 19/05/2016
 * Time: 00:06
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function indexHome(){
            if (\Auth::check()){
                return view('Home');
            }
            return redirect(url('/userNotLogged'));
    }
}
