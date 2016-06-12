<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $year
 * @property string $name
 * @property date $start_date
 * @property date $end_date
 */
class SchoolTerm extends Model
{
    protected $table = 'school_terms';

    protected $primaryKey = 'id';
}
