<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{	
	//protected $table = 'todos';    //neu khong dat ten Model giong ten bang thi ntn
	protected $fillable = ['todo'];  //danh sach cac cot trong bang (ko co cot dac biet)
	//lay tat ca du lieu trong bang
    public static function getAll(){
    	//return Todo::get();   
    	//return sefl::get();
    	
    	return Todo::paginate(4);
    }

    public static function store($data){
    	// $todo = new Todo();
    	// $todo->todo = $data['todo'];  //ten cot
    	//return $todo->save();
    	Todo::create($data);   //nhanh hon
    	return true;
    }
}
