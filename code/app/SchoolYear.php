<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $owner
 * @property string $name
 * @property date $start_date
 * @property date $end_date
 */
class SchoolYear extends Base
{
    protected $table = 'school_years';

    protected $primaryKey = 'id';
}
