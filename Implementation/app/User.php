<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function courses_create(){
      return $this->hasMany('App\Course','creator_id');
    }

    public function courses(){
      return $this->belongsToMany('App\Course', 'user_course', 'user_id', 'course_id');
    }

}
