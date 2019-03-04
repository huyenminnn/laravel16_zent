<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index(){

    	$todo = new Todo();
    	$todos = $todo->getAll(); //ham lay tat ca cua Model

    	//['key1'=>'value1','key2'=>'value2']   truyen nhieu tham so ntn
    	return view('home/test',['data'=>$todos]);  //file trong views, tham so la mang
    }

    public function create(){
    	return view('home/create');
    }

    public function store(Request $request){
    	$input = $request->all();
    	Todo::store($input);
    	return redirect('/todo');
    }

    public function show($id){
    	$data = Todo::find($id);
    	return view('home/show',['data'=>$data]);
    }

    public function delete($id){
    	$data = Todo::find($id);
    	$data->delete();
    	return redirect('/todo');
    	
    }
}
