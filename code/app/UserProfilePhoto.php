<?php
/**
 * Created by PhpStorm.
 * User: Bruno Messias
 * Date: 15/06/2016
 * Time: 16:41
 */

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int user
 * @property string url
 */
class UserProfilePhoto extends Authenticatable
{

    protected $table = 'user_profile_picture';

    protected $primaryKey = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url'
    ];
}