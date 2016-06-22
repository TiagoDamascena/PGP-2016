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

    public function schedules()
    {
        return $this->hasMany('App\Schedule', 'subject', 'id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task', 'subject', 'id');
    }

    public function exams()
    {
        return $this->hasMany('App\Exam', 'subject', 'id');
    }
}
