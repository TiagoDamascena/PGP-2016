<?php
/**
 * User: Michel
 * Date: 30/05/2016
 * Time: 16:01
 */

namespace App\Http\Controllers;

use App\User;
use App\Schedule;
use App\Task;
use App\Exam;
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
		$schedule->day = implode(';',Input::get('day'));
		$schedule->start_time = Input::get('startTime');
		$schedule->end_time = Input::get('endTime');

		$subject = \App\Subject::where('id',$subject_id)->first();
		
        if(strtotime($schedule->start_time) >= strtotime($schedule->end_time)){
        	$subjectFeedback = 'schedule_date_error';
            return view('Subject',compact('subject','subjectFeedback'));
        }

        $schedule->save();
		return redirect(url('/subject/'.$subject_id));
	}
	
	public function createTask ($subject_id) {
		$user = \Auth::user();
		$task = new Task();
		$task->subject = $subject_id;
		$task->due_date = Input::get('due_date');
		$task->title = Input::get('title');
		$task->description = Input::get('description');
		
		$subject = \App\Subject::where('id',$subject_id)->first();
		
		if(!$subject) {
			return redirect(url('/home'));
		} else {
			$task->save();
			return redirect(url('/subject/'.$subject_id));
		}
	}
	
	public function createExam ($subject_id) {
		$user = \Auth::user();
		$exam = new Exam();
		$exam->subject = $subject_id;
		$exam->date = Input::get('date');
		$exam->start_time = Input::get('start_time');
		$exam->building = Input::get('building');
		$exam->room = Input::get('room');
		$exam->description = Input::get('description');
		
		$subject = \App\Subject::where('id',$subject_id)->first();
		
		if(!$subject) {
			return redirect(url('/home'));
		} else {
			$exam->save();
			return redirect(url('/subject/'.$subject_id));
		}
	}
}