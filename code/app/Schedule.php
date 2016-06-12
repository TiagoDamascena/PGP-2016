<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $subject
 * @property string $building
 * @property string $room
 * @property string $day
 * @property string $start_time
 * @property string $end_time
 */
class Schedule extends Model
{
    protected $table = 'schedules';

    protected $primaryKey = 'id';
}
