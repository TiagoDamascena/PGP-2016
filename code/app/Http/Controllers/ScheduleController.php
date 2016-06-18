<?php
/**
 * User: Michel
 * Date: 30/05/2016
 * Time: 16:01
 */

namespace App\Http\Controllers;

use App\User;
use App\SchoolYear;
use App\SchoolTerm;
use App\Subject;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class ScheduleController extends Controller
{
    public function index () {
        if (\Auth::check()){
            $scheduleFeedback = null;
            return view('Schedule', compact('scheduleFeedback'));
        }
        return redirect(url('/userNotLogged'));
    }

    public function getYears () {
        $user = \Auth::user();
        $years = SchoolYear::where('owner',$user->id)->orderBy('name')->get();
        return \Response::json($years);
    }

    public function getTerms ($yearId) {
        $terms = SchoolTerm::where('year',$yearId)->orderBy('name')->get();
        return \Response::json($terms);
    }

    public function getSubjects ($termId) {
        $subjects = Subject::where('term',$termId)->orderBy('name')->get();
        return \Response::json($subjects);
    }

    public function createSchoolYear () {
		$user = \Auth::user();
		$schoolYear = new SchoolYear();
		$schoolYear->owner = $user->id;
		$schoolYear->name = Input::get('name');
		$schoolYear->start_date = Input::get('startDate');
		$schoolYear->end_date = Input::get('endDate');

		$compare = SchoolYear::where('name',$schoolYear->name)->where('owner',$user->id)->first();
        if($compare){
            $scheduleFeedback = 'school_year_already_exists';
            return view('Schedule',compact('scheduleFeedback'));
        }
		
        if(strtotime($schoolYear->start_date) >= strtotime($schoolYear->end_date)){
        	$scheduleFeedback = 'school_term_date_error';
            return view('Schedule',compact('scheduleFeedback'));
        }
		
        $schoolYear->save();
		return redirect(url('/schedule'));
	}

    public function editSchoolYear ($yearId) {
        $schoolYear = SchoolYear::where('id',$yearId)->first();
        if ($schoolYear) {
            $schoolYear->name = Input::get('name');
            $schoolYear->start_date = Input::get('startDate');
            $schoolYear->end_date = Input::get('endDate');

            if(strtotime($schoolYear->start_date) >= strtotime($schoolYear->end_date)) {
                $scheduleFeedback = 'school_year_date_error';
                return view('Schedule',compact('scheduleFeedback'));
            }

            $schoolYear->save();
            return redirect(url('/schedule'));
        } else {
            $scheduleFeedback = 'school_year_null';
            return view('Schedule',compact('scheduleFeedback'));
        }
    }

	public function createSchoolTerm ($yearID) {
		$user = \Auth::user();
		$schoolTerm = new SchoolTerm();
		$schoolTerm->year = $yearID;
		$schoolTerm->name = Input::get('name');
		$schoolTerm->start_date = Input::get('startDate');
		$schoolTerm->end_date = Input::get('endDate');

		$compare = SchoolTerm::where('name',$schoolTerm->name)->where('year', $schoolTerm->year)->first();
        if($compare){
            $scheduleFeedback = 'school_term_already_exists';
            return view('Schedule',compact('scheduleFeedback'));
        }

        if(strtotime($schoolTerm->start_date) >= strtotime($schoolTerm->end_date)){
        	$scheduleFeedback = 'school_term_date_error';
            return view('Schedule',compact('scheduleFeedback'));
        }

        $schoolTerm->save();
		return redirect(url('/schedule'));
	}

    public function editSchoolTerm ($termId) {
        $schoolTerm = SchoolTerm::where('id',$termId)->first();
        if ($schoolTerm) {
            $schoolTerm->name = Input::get('name');
            $schoolTerm->start_date = Input::get('startDate');
            $schoolTerm->end_date = Input::get('endDate');

            if(strtotime($schoolTerm->start_date) >= strtotime($schoolTerm->end_date)) {
                $scheduleFeedback = 'school_term_date_error';
                return view('Schedule',compact('scheduleFeedback'));
            }

            $schoolTerm->save();
            return redirect(url('/schedule'));
        } else {
            $scheduleFeedback = 'school_term_null';
            return view('Schedule',compact('scheduleFeedback'));
        }
    }
    
	public function createSubject($schoolTermID)
    {
        $user = \Auth::user();
        $subject = new Subject();
        $subject->term = $schoolTermID;
        $subject->name = Input::get('name');
        $subject->teacher = Input::get('teacher');

        $compare = Subject::where('name', $subject->name)->where('term', $subject->term)->first();
        if ($compare) {
            $scheduleFeedback = 'subject_already_exists';
            return view('Schedule', compact('scheduleFeedback'));
        }
        
        $subject->save();
        return redirect(url('/schedule'));
    }
}