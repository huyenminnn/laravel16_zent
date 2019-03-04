<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['code','name','price','quantity'];  //danh sach cac cot trong bang (ko co cot dac biet)
	public static function getAll(){
    	return Product::paginate(4);
    }
    public static function store($data){
    	// $todo = new Todo();
    	// $todo->todo = $data['todo'];  //ten cot
    	//return $todo->save();
    	//Product::create($data);   //nhanh hon
    	//return true;
    }
}
