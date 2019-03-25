<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','thumbnail','description','content','slug','user_id','category_id','view_count'];

    //1 post cua 1 user (1-n)
    public function user(){
    	return $this->belongsTo('App\User');
    }

    //1 post co 1 category (1-n)
    public function cate(){
        return $this->belongsTo('App\Category','category_id','id');
    }

    //1 post co nhieu tag (n-n)
    public function tags(){
        return $this->belongsToMany('App\Tag','posts_tags','post_id','tag_id');
    }
}
