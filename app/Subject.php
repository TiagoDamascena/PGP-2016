<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $term
 * @property string $name
 * @property string $teacher
 * @property Schedule|Collection $schedules
 * @property Task|Collection $tasks
 * @property Exam|Collection $exams
 */
class Subject extends Base
{
    protected $table = 'subjects';

    protected $primaryKey = 'id';

    public function schedules() {
        $schedules = $this->hasMany('App\Schedule', 'subject');
        return $schedules;
    }

    public function tasks() {
        $tasks = $this->hasMany('App\Task', 'subject');
        return $tasks;
    }

    public function exams() {
        $exams = $this->hasMany('App\Exam', 'subject');
        return $exams;
    }
}
