<?php
/**
 * User: Michel
 * Date: 30/05/2016
 * Time: 16:01
 */

namespace App\Http\Controllers;

use App\Schedule;
use App\Subject;
use App\Task;
use App\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class SubjectController extends Controller {

    public function indexSubject ($subject_id) {
        if (Auth::check()) {
            $subject = \App\Subject::where('id',$subject_id)->first();
            if(!$subject) {
                $response = redirect(url('/home'));
            } else {
                $subjectFeedback = null;
                $response = view('Subject', compact('subject','subjectFeedback'));
            }
        } else {
            $response = redirect(url('/userNotLogged'));
        }

        return $response;
    }

    public function getSubject ($subjectId) {
        $subject = Subject::where('id',$subjectId)->first();
        $response = Response::json($subject);
        return $response;
    }

    public function deleteSubject ($subject_id) {
        $subject = Subject::where('id',$subject_id)->first();
        if ($subject) {
            $subject->delete();
        }

        $response = redirect(url('/schedule'));
        return $response;
    }

    public function getSchedules ($subjectId) {
        $schedule = Schedule::where('subject',$subjectId)->orderBy('day')->get();
        $response = Response::json($schedule);
        return $response;
    }

    public function getSchedule ($scheduleId) {
        $schedule = Schedule::where('id',$scheduleId)->first();
        $response = Response::json($schedule);
        return $response;
    }

    public function createSchedule ($subject_id) {
        $schedule = new Schedule();
        $schedule->subject = $subject_id;
        $schedule->building = Input::get('building');
        $schedule->room = Input::get('room');
        $schedule->day = implode(';',Input::get('day'));
        $schedule->start_time = Input::get('startTime');
        $schedule->end_time = Input::get('endTime');

        $subject = Subject::where('id',$subject_id)->first();

        if (strtotime($schedule->start_time) >= strtotime($schedule->end_time)) {
            $subjectFeedback = 'schedule_date_error';
            $response = view('Subject',compact('subject','subjectFeedback'));
        } else {
            $schedule->save();
            $response = redirect(url('/subject/'.$subject_id));
        }

        return $response;
    }

    public function deleteSchedule ($schedule_id) {
        $schedule = Schedule::where('id',$schedule_id)->first();
        if ($schedule) {
            $schedule->delete();
        }
        $response = redirect(url('/schedule'));
        return $response;
    }

    public function getTasks ($subjectId) {
        $tasks = Task::where('subject',$subjectId)->orderBy('due_date')->get();
        return \Response::json($tasks);
    }

    public function getExams ($subjectId) {
        $exams = Exam::where('subject',$subjectId)->orderBy('date')->get();
        return \Response::json($exams);
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

	public function editTask ($task_id) {
		$task = Task::where('id', $task_id)->first();
		if($task) {
			$task->due_Date = Input::get('due_date');
			$task->title = Input::get('title');
			$task->description = Input::get('description');
			$task->save();
			return redirect(url('/subject/'.$task->subject));
		} else {
			$scheduleFeedback = 'task_null';
			return view('Subject',compact('subject','subjectFeedback'));
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

	public function editExam ($exam_id) {
		$exam = Exam::where('id', $exam_id)->first();
		if($exam) {
			$exam->date = Input::get('date');
			$exam->start_time = Input::get('start_time');
			$exam->building = Input::get('building');
			$exam->room = Input::get('room');
			$exam->description = Input::get('description');
			$exam->save();
			return redirect(url('/subject/'.$exam->subject));
		} else {
			$scheduleFeedback = 'exam_null';
			return view('Subject',compact('subject','subjectFeedback'));
		}
	}
	
	public function editSchedule ($scheduleId) {
		$schedule = Schedule::where('id', $scheduleId)->first();
		if($schedule) {
			$schedule->building = Input::get('building');
			$schedule->room = Input::get('room');
			$schedule->day = implode(';',Input::get('day'));
			$schedule->start_time = Input::get('startTime');
			$schedule->end_time = Input::get('endTime');

			if(strtotime($schedule->start_time) >= strtotime($schedule->end_time)){
				$subjectFeedback = 'schedule_date_error';
				return view('Subject',compact('subject','subjectFeedback'));
			}

			$schedule->save();
			return redirect(url('/subject/'.$schedule->subject));
		} else {
			$scheduleFeedback = 'schedule_null';
			return view('Subject',compact('subject','subjectFeedback'));
		}
	}
}