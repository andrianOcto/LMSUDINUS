<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'section';

    public function course(){
      return $this->belongsTo('App\Course','course_id');
    }

}
