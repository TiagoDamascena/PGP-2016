<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 19/05/2016
 * Time: 00:06
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    public function indexHome() {
        if (Auth::check()) {
            $response = view('Home');
        } else {
            $response = redirect(url('/userNotLogged'));
        }

        return $response;
    }
}
