<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public $table = 'categories';
    protected $fillable = ['name','parent_id','thumbnail','slug','description'];

    //1 category cos nhieu post
    // public function posts(){
    //     return $this->belongsToMany('App\Post','posts_categories','category_id','post_id');
    // }
    public function posts(){
        return $this->hasMany('App\Post','category_id','id');
    }
    
}
