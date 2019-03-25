<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   protected $fillable = ['name','slug'];

   //1 tag co nhieu post
   public function posts(){
        return $this->belongsToMany('App\Post','posts_tags','tag_id','post_id');
    }
}
