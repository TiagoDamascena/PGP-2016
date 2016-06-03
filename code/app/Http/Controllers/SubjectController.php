<?php
/**
 * User: Michel
 * Date: 30/05/2016
 * Time: 16:01
 */

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class SubjectController extends Controller
{
	public function createSchedule ($SchoolTermID) {
		$user = \Auth::user();
		$schedule = new Schedule();
		$schedule->subject = $SchoolTermID;
		$schedule->building = Input::get('building');
		$schedule->room = Input::get('room');
		$schedule->day = Input::get('day');
		$schedule->startDate = Input::get('startTime');
		$schedule->endDate = Input::get('endTime');

		$compare = Schedule::where('day',$schedule->day)->where('startTime', $schedule->startTime)->first();
        if($compare){
            $subjectFeedback = 'schedule_already_exists';
            return view('Subject',compact('subjectFeedback'));
        }

        if(strtotime($schedule->startTime) >= strtotime($schedule->endTime)){
        	$subjectFeedback = 'schedule_date_error';
            return view('Subject',compact('subjectFeedback'));
        }

        $schedule->save();
		return redirect(url('/Subject'));
	}
}