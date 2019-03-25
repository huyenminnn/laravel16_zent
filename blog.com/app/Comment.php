<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public protected $fillable = ['user_id','blog_id','comment'];
    public static function getAll(){
    	return Comment::paginate(10);
    }
    public static function store($data){
    } 
}
