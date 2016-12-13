<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $creationDate
 */
class User extends Authenticatable
{
    public $timestamps = false;

    protected $table = 'users';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function years() {
        $years = $this->hasMany('App\SchoolYear', 'owner');
        return $years;
    }
}
