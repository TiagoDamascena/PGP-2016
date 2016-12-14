<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 12/12/16
 */

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Support\Facades\Response;
use phpDocumentor\Reflection\Types\Object_;

class TaskController extends Controller
{

    public function index() {
        $response = view('Tasks');
        return $response;
    }

    public function getUserTask() {
        $listTasks = $this->searchTask();
        $response = $this->tasksToJson($listTasks);
        return $response;
    }

    private function searchTask() {
        $user = \Auth::User();
        $listYears = $this->getSchoolYear($user);
        $listTerms = $this->getSchoolTerm($listYears);
        $listSubjects = $this->getSubjects($listTerms);
        $listTasks = $this->getTasks($listSubjects);
        return $listTasks;
    }

    private function getSchoolYear($user) {
        $response = [];
        $schoolYears = $user->years;
        $response = $this->addResponse($response, $schoolYears);
        return $response;
    }

    private function getSchoolTerm($schoolYears) {
        $response = [];
        foreach ($schoolYears as $schoolYear) {
            $schoolTerms = $schoolYear->terms()->get();
            $response = $this->addResponse($response, $schoolTerms);
        }

        return $response;
    }

    private function getSubjects($schoolTerms) {
        $response = [];
        foreach ($schoolTerms as $schoolTerm) {
            $subjects = $schoolTerm->subjects()->get();
            $response = $this->addResponse($response, $subjects);
        };
        return $response;
    }

    private function getTasks($subjects) {
        $response = [];
        foreach ($subjects as $subject) {
            $task = $subject->tasks()->get();
            $response = $this->addTask($response, $task);
        }

        return $response;
    }

    private function addResponse($list, $objects) {
        foreach ($objects as $object) {
            $size = count($list);
            $list[$size] = $object;
        };

        return $list;
    }

    private function addTask($list, $objects) {
        $size = count($list);
        $list[$size] = $objects;
        return $list;
    }

    private function tasksToJson($listTasks) {
        $response = [];
        foreach ($listTasks as $tasks) {
            $tasks = json_decode($tasks);
            foreach ($tasks as $task) {
                $taskJson = new Object_();
                $taskJson->id = $task->id;
                $taskJson->title = $task->title;
                $taskJson->due_date = $task->due_date;
                $taskJson->description = $task->description;
                $taskJson->subject_name = Subject::where('id', $task->subject)->first()->name;
                $taskJson->date_status = $this->dateStatus($task->due_date);
                $response = $this->addTask($response,$taskJson);
            }
        }

        $response = Response::json($response);
        return $response;
    }

    private function dateStatus($dateTask) {
        // Comparando as Datas
        if (strtotime(date('Y-m-d')) > strtotime($dateTask)) {
            $response = "past-task";
        } elseif (strtotime(date('Y-m-d', strtotime('+1 week'))) >= strtotime($dateTask)) {
            $response = "present-task";
        } else {
            $response = "future-task";
        }

        return $response;
    }
}