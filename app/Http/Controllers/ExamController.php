<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ExamController extends Controller {

    public function getExamsWeek() {
        $user = Auth::user();
        $date = Carbon::today();
        $nextWeek = $date->addDays(7);

        $result = array();

        $years = $user->years()->where('start_date', '<=', $nextWeek->toDateString())->orWhere('end_date', '>=', $date->toDateString())->get();
        foreach ($years as $year) {
            $terms = $year->terms()->where('start_date', '<=', $nextWeek->toDateString())->orWhere('end_date', '>=', $date->toDateString())->get();
            foreach ($terms as $term) {
                $subjects = $term->subjects()->get();
                foreach ($subjects as $subject) {
                    $exams = $subject->exams()->where('date', '<=', $nextWeek->toDateString())->orWhere('date', '>=', $date->toDateString())->get();
                    foreach ($exams as $exam) {
                        $exam->subject = $subject;
                        array_push($result, $exam);
                    }
                }
            }
        }

        $response = Response::json($result);
        return $response;
    }
}
