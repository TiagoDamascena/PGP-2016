<?php

namespace App\Http\Controllers;

use App\SchoolYear;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ClassController extends Controller {

    public function getClassesToday() {
        $user = Auth::user();
        $date = date('Y-m-d');
        $dayOfWeek = date('w');

        $result = array();

        $years = $user->years()->where('start_date', '<=', $date)->where('end_date', '>=', $date)->get();
        foreach ($years as $year) {
            $terms = $year->terms()->where('start_date', '<=', $date)->where('end_date', '>=', $date)->get();
            foreach ($terms as $term) {
                $subjects = $term->subjects()->get();
                foreach ($subjects as $subject) {
                    $schedules = $subject->schedules()->where('day', $dayOfWeek)->get();
                    foreach ($schedules as $schedule) {
                        $schedule->subject = $subject;
                        array_push($result, $schedule);
                    }
                }
            }
        }

        $response = Response::json($result);
        return $response;
    }
}
