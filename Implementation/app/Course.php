<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

  public function sections(){
    return $this->hasMany('App\Course');
  }

  public function user_create(){
    return $this->belongsTo('App\User','creator_id');
  }

  public function users(){
    return $this->belongsToMany('App\User', 'user_course', 'course_id', 'user_id');
  }
}
