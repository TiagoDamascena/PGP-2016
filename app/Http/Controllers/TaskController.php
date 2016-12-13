<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 12/12/16
 */

namespace App\Http\Controllers;

use App\SchoolTerm;
use App\SchoolYear;
use App\Subject;
use App\Task;
use Illuminate\Support\Facades\Response;

class TaskController extends Controller
{
    private $list  = [];

    public function index() {
        return view('Tasks');
    }

    public function getUserTask() {
        $this->searchTask();
        $response = Response::json($this->list);
        return $response;
    }

    private function searchTask() {
        $userId = \Auth::User()->id;
        $this->getSchoolYear($userId);
    }

    private function getSchoolYear($userId) {
        $schoolYears = SchoolYear::where('owner', $userId)->get();
        $this->getSchoolTerm($schoolYears);
    }

    private function getSchoolTerm($schoolYears) {
        foreach ($schoolYears as $schoolYear) {
            $schoolTerms = SchoolTerm::where('year', $schoolYear->id)->get();
            $this->getSubjects($schoolTerms);
        }
    }

    private function getSubjects($schoolTerms) {
        foreach ($schoolTerms as $schoolTerm) {
            $subjects = Subject::where('term', $schoolTerm->id)->get();
            $this->getTaks($subjects);
        }
    }

    private function getTaks($subjects) {
        foreach ($subjects as $subject) {
            $tasks = Task::where('subject', $subject->id)->get();
            foreach ($tasks as $task) {
                array_push($this->list,$task);
            }
        }
    }
}