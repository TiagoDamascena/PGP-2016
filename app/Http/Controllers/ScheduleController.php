<?php
/**
 * User: Michel
 * Date: 30/05/2016
 * Time: 16:01
 */

namespace App\Http\Controllers;

use App\SchoolYear;
use App\SchoolTerm;
use App\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ScheduleController extends Controller {

    public function indexSchedule () {
        if (Auth::check()) {
            $scheduleFeedback = null;
            $response = view('Schedule', compact('scheduleFeedback'));
        } else {
            $response = redirect(url('/userNotLogged'));
        }

        return $response;
    }

    public function getYears () {
        $user = Auth::user();
        $years = SchoolYear::where('owner',$user->id)->orderBy('name')->get();
        $response = Response::json($years);
        return $response;
    }

    public function getTerms ($yearId) {
        $terms = SchoolTerm::where('year',$yearId)->orderBy('name')->get();
        $response = Response::json($terms);
        return $response;
    }

    public function getSubjects ($termId) {
        $subjects = Subject::where('term',$termId)->orderBy('name')->get();
        $response = Response::json($subjects);
        return $response;
    }

    public function getYear($yearId) {
        $year = SchoolYear::where('id', $yearId)->first();
        $response = Response::json($year);
        return $response;
    }

    public function getTerm($termId) {
        $term = SchoolTerm::where('id', $termId)->first();
        $response = Response::json($term);
        return $response;
    }

    public function createSchoolYear () {
        $user = \Auth::user();
        $schoolYear = new SchoolYear();
        $schoolYear->owner = $user->id;
        $schoolYear->name = Input::get('name');
        $schoolYear->start_date = Input::get('startDate');
        $schoolYear->end_date = Input::get('endDate');

        $compare = SchoolYear::where('name',$schoolYear->name)->where('owner',$user->id)->first();
        if ($compare) {
            $scheduleFeedback = 'school_year_already_exists';
            $response = view('Schedule',compact('scheduleFeedback'));
            return $response;
        }

        if (strtotime($schoolYear->start_date) >= strtotime($schoolYear->end_date)) {
            $scheduleFeedback = 'school_term_date_error';
            $response = view('Schedule',compact('scheduleFeedback'));
            return $response;
        }

        $schoolYear->save();
        $response = redirect(url('/schedule'));
        return $response;
    }

    public function editSchoolYear ($yearId) {
        $schoolYear = SchoolYear::where('id',$yearId)->first();
        if ($schoolYear) {
            $schoolYear->name = Input::get('name');
            $schoolYear->start_date = Input::get('startDate');
            $schoolYear->end_date = Input::get('endDate');

            if (strtotime($schoolYear->start_date) >= strtotime($schoolYear->end_date)) {
                $scheduleFeedback = 'school_year_date_error';
                $response = view('Schedule',compact('scheduleFeedback'));
            } else {
                $schoolYear->save();
                $response = redirect(url('/schedule'));
            }
        } else {
            $scheduleFeedback = 'school_year_null';
            $response = view('Schedule',compact('scheduleFeedback'));
        }

        return $response;
    }

    public function removeSchoolYear ($yearId) {
        $schoolYear = SchoolYear::where('id',$yearId)->first();
        if ($schoolYear) {
            $schoolYear->delete();
        }

        $response = redirect(url('/schedule'));
        return $response;
    }

    public function createSchoolTerm ($yearID) {
        $schoolTerm = new SchoolTerm();
        $schoolTerm->year = $yearID;
        $schoolTerm->name = Input::get('name');
        $schoolTerm->start_date = Input::get('startDate');
        $schoolTerm->end_date = Input::get('endDate');

        $compare = SchoolTerm::where('name',$schoolTerm->name)->where('year', $schoolTerm->year)->first();
        if ($compare) {
            $scheduleFeedback = 'school_term_already_exists';
            $response = view('Schedule',compact('scheduleFeedback'));
            return $response;
        }

        if (strtotime($schoolTerm->start_date) >= strtotime($schoolTerm->end_date)) {
            $scheduleFeedback = 'school_term_date_error';
            $response = view('Schedule',compact('scheduleFeedback'));
            return $response;
        }

        $schoolTerm->save();
        $response = redirect(url('/schedule'));
        return $response;
    }

    public function editSchoolTerm ($termId) {
        $schoolTerm = SchoolTerm::where('id',$termId)->first();
        if ($schoolTerm) {
            $schoolTerm->name = Input::get('name');
            $schoolTerm->start_date = Input::get('startDate');
            $schoolTerm->end_date = Input::get('endDate');

            if (strtotime($schoolTerm->start_date) >= strtotime($schoolTerm->end_date)) {
                $scheduleFeedback = 'school_term_date_error';
                $response = view('Schedule',compact('scheduleFeedback'));
                return $response;
            }

            $schoolTerm->save();
            $response = redirect(url('/schedule'));
            return $response;
        } else {
            $scheduleFeedback = 'school_term_null';
            $response = view('Schedule',compact('scheduleFeedback'));
            return $response;
        }
    }

    public function removeSchoolTerm ($termID) {
        $schoolTerm = SchoolTerm::where('id',$termID)->first();
        if ($schoolTerm) {
            $schoolTerm->delete();
        }

        $response = redirect(url('/schedule'));
        return $response;
    }

    public function createSubject ($schoolTermID) {
        $subject = new Subject();
        $subject->term = $schoolTermID;
        $subject->name = Input::get('name');
        $subject->teacher = Input::get('teacher');

        $compare = Subject::where('name', $subject->name)->where('term', $subject->term)->first();
        if ($compare) {
            $scheduleFeedback = 'subject_already_exists';
            $response = view('Schedule', compact('scheduleFeedback'));
            return $response;
        }

        $subject->save();
        $response = redirect(url('/schedule'));
        return $response;
    }

    public function editSubject ($subjectId) {
        $subject = Subject::where('id',$subjectId)->first();
        if ($subject) {
            $subject->name = Input::get('name');
            $subject->teacher = Input::get('teacher');

            $subject->save();
            $response = redirect(url('/schedule'));
        } else {
            $scheduleFeedback = 'subject_null';
            $response = view('Schedule',compact('scheduleFeedback'));
        }
        return $response;
    }
}