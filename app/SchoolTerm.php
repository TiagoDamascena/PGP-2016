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
class SchoolTerm extends Base
{
    protected $table = 'school_terms';

    protected $primaryKey = 'id';

    public function subjects() {
        $subjects = $this->hasMany('App\Subject', 'term');
        return $subjects;
    }
}
