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

	public function newSchoolHalfYear () {
		return view('CreateHalfYear');
	}

	public function createSchoolYear () {
		$user = \Auth::user();
		$schoolYear = new SchoolYear();
		$schoolYear->owner = $user->id;
		$schoolYear->name = Input::get('name');
		$schoolYear->startDate = Input::get('startDate');
		$schoolYear->endDate = Input::get('endDate');

		$compare = SchoolYear::where('name',$schoolYear->name)->where('owner',$user->id)->first();
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

	public function createSchoolHalfYear () {
		$user = \Auth::user();
		$schoolHalfYear = new SchoolHalfYear();
		$schoolHalfYear->year = $schoolYear->id;
		$schoolHalfYear->name = Input::get('name');
		$schoolHalfYear->startDate = Input::get('startDate');
		$schoolHalfYear->endDate = Input::get('endDate');

		$compare = SchoolHalfYear::where('name',$schoolHalfYear->name)->first();
        if($compare){
            $newSchoolHalfYearError = 'school_half_year_already_exists';
            return view('CreateHalfYear',compact('newSchoolHalfYearError'));
        }

        $compare = (strtotime($startDate) < strtotime($endDate));
        if($compare){
        	$newSchoolHalfYearError = 'school_year_date_error';
            return view('CreateHalfYear',compact('newSchoolHalfYearError'));
        }

        $schoolHalfYear->save();
	}
}