<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    // protected $table = 'mobiles';   neu ten table ko dung chuan canf anh xa nay
    // 
    public function user(){
        return $this->belongsTo('App\User'); 
    } 
}
