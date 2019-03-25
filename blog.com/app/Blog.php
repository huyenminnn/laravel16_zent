<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['content','images'];
    public static function getAll(){
    	return Blog::paginate(10);
    }
    public static function store($data){
    } 
}
