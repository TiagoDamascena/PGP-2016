<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $subject
 * @property date $due_date
 * @property string $title
 * @property string $description
 * @property string $subject_name
 * @property boolean $complete
 */
class Task extends Base
{
    protected $table = 'tasks';

    protected $primaryKey = 'id';
}
