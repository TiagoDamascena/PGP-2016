<?php
/**
 * User: Michel
 * Date: 30/05/2016
 * Time: 16:01
 */

namespace App\Http\Controllers;

use App\User;
use App\SchoolYear;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class ScheduleController extends Controller
{
	public function newSchoolYear () {
		return view('CreateYear');
	}

	public function createSchoolYear () {
		$user = \Auth::user();
		$schoolYear = new SchoolYear();
		$schoolYear->owner = $user->id;
		$schoolYear->name = Input::get('name');
		$schoolYear->startDate = Input::get('startDate');
		$schoolYear->endDate = Input::get('endDate');

		$compare = SchoolYear::where('name',$name)->where('owner',$user->id)->first();
        if($compare){
            $newSchoolYearError = 'school_year_already_exists';
            return view('CreateYear',compact('newSchoolYearError'));
        }

        $compare = (strtotime($startDate) < strtotime($endDate));
        if($compare){
        	$newSchoolYearError = 'school_year_date_error';
            return view('CreateYear',compact('newSchoolYearError'));
        }

        $schoolYear->save();
	}
}