<?php

namespace App\Http\Controllers;

use App\SchoolTerm;
use App\SchoolYear;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CalendarController extends Controller {

    public function index() {
        if (Auth::check()) {
            $response = view('Calendar');
        } else {
            $response = redirect(url('/userNotLogged'));
        }

        return $response;
    }

    public function getCalendar(Request $request) {
        $user = Auth::user();
        $years = SchoolYear::where('owner', $user->id)->get();

        $objects = array();
        foreach ($years as $year) {
            $terms = $year->terms()->where('start_date', '<=', $request->get('end'))->where('end_date', '>=', $request->get('start'))->get();
            foreach ($terms as $term) {
                $subjects = $term->subjects()->get();
                foreach ($subjects as $subject) {
                    $schedules = $subject->schedules()->get();
                    foreach ($schedules as $schedule) {
                        $object = [
                            'color' => '#3c8dbc',
                            'type' => 'schedule',
                            'id' => $schedule->id,
                            'title' => $subject->name,
                            'start' => $schedule->start_time,
                            'end' => $schedule->end_time,
                            'dow' => explode(';', $schedule->day),
                            'range' => [
                                'start' => $term->start_date,
                                'end' => $term->end_date
                            ]
                        ];
                        array_push($objects, $object);
                    }

                    $tasks = $subject->tasks()->get();
                    foreach ($tasks as $task) {
                        $object = [
                            'color' => '#33cc33',
                            'type' => 'task',
                            'id' => $task->id,
                            'title' => $task->title,
                            'start' => $task->due_date.'T'.$task->due_time.'Z',
                            'end' => $task->due_date.'T'.$task->due_time.'Z',
                        ];
                        array_push($objects, $object);
                    }

                    $exams = $subject->exams()->get();
                    foreach ($exams as $exam) {
                        $object = [
                            'color' => '#ff9900',
                            'type' => 'exam',
                            'id' => $exam->id,
                            'title' => $subject->name,
                            'start' => $exam->date.'T'.$exam->start_time,
                            'end' => $exam->date.'T'.$exam->start_time,
                        ];
                        array_push($objects, $object);
                    }
                }
            }
        }

        $response = Response::json($objects);
        return $response;
    }
}
