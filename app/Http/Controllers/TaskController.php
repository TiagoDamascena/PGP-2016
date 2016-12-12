<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 12/12/16
 */

namespace App\Http\Controllers;

class TaskController extends Controller{
    /**
     * @return string
     */
    public function index(){
        return view('Tasks');
    }
}