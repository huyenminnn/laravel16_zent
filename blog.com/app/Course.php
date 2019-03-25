<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	// quan he 1-n
    // public function user(){
    // 	return $this->belongsTo('App\User');
    // }

    public function user(){
        return $this->belongsToMany('App\User','users_courses','course_id','user_id');
    }
}
