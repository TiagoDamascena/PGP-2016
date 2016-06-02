<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user
 * @property string $unique_key
 */

class Change_password extends Model
{
    protected $table = 'change_password';
    protected $primaryKey = 'user';
}
