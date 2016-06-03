<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $subject
 * @property date $due_date
 * @property string $title
 * @property string $description
 * @property boolean $complete
 */
class Task extends Model
{
    protected $table = 'tasks';

    protected $primaryKey = 'id';
}
