<?php
/**
 * User: Michel
 * Date: 30/05/2016
 * Time: 16:01
 */

namespace App\Http\Controllers;

use App\User;
use App\Schedule;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class SubjectController extends Controller
{
	public function createSchedule ($subject_id) {
		$user = \Auth::user();
		$schedule = new Schedule();
		$schedule->subject = $subject_id;
		$schedule->building = Input::get('building');
		$schedule->room = Input::get('room');
		$schedule->day = Input::get('day');
		$schedule->start_time = Input::get('startTime');
		$schedule->end_time = Input::get('endTime');

		$subject = \App\Subject::where('id',$subject_id)->first();

		$compare = Schedule::where('day',$schedule->day)->where('start_time', $schedule->start_time)->first();
        if($compare){
            $subjectFeedback = 'schedule_already_exists';
            return view('Subject',compact('subject','subjectFeedback'));
        }

        if(strtotime($schedule->start_time) >= strtotime($schedule->end_time)){
        	$subjectFeedback = 'schedule_date_error';
            return view('Subject',compact('subject','subjectFeedback'));
        }

        $schedule->save();
		return redirect(url('/subject/'.$subject_id));
	}
}