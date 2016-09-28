<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $subject
 * @property date $date
 * @property time $start_time
 * @property string $building
 * @property string $room
 * @property string $description
 */
class Exam extends Base
{
    protected $table = 'exams';

    protected $primaryKey = 'id';
}
