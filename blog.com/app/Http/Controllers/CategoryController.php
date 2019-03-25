<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index(){
    	$cate = Category::all();
    	return view('manager.category');
    	// return Datatables::of($cate)->make(true);
    }

    //edit column
    public function getData(){
    	$categories = Category::get();
    	return Datatables::of($categories)
            ->addColumn('action', function ($category) {
                return '<button type="button" class="btn btn-success btn-show" data-id="'.$category->id.'">Detail</button>
						<button type="button" class="btn btn-warning btn-edit" data-id="'.$category->id.'">Edit</button>
						<button type="button" class="btn btn-danger btn-delete" data-id="'.$category->id.'">Delete</button>';
            })
            // ->editColumn('created_at', function($category) {
            //     $now = Carbon::now();
            //     return $category->created_at->diffForHumans($now);
            // })
            ->editColumn('updated_at', function($category) {
                $now = Carbon::now();
                return $category->updated_at->diffForHumans($now);
            })
            ->editColumn('thumbnail', function($category) {
                    return '<img style="width: 100px;height: 100px;" src="/storage/'.$category->thumbnail.'">';
            })
            
            ->rawColumns(['thumbnail','action','created_at','updated_at'])
                
            ->make(true);
    }

    // 
    public function show($id){
        $category = Category::find($id);
        if ($category->parent_id==0) {
            $category->parent = "none";
        } else $category->parent = Category::find($category->parent_id)->name;
        return $category;
    }

    public function store(CategoryRequest $request){

        $cate = new Category();
        $thumb = $request->thumbnail->storeAs('images',$request->thumbnail->getClientOriginalName());
        $cate->thumbnail = $thumb;
        $cate->name = $request->name;
        $cate->slug = $request->slug;
        $cate->parent_id = $request->parent_id;
        $cate->description = $request->description;
        
        $cate->save();
        return $cate;
    }

    public function update(CategoryRequest $request, $id)
    {
        $cate=Category::find($id);
        if ($request->thumbnail == 'none') {
            $cate->update([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,
                'slug'=>$request->slug,
                'description'=>$request->description,
            ]);
        } else{
            $thumb = $request->thumbnail->storeAs('images',$request->thumbnail->getClientOriginalName());
            $cate->update([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,
                'slug'=>$request->slug,
                'description'=>$request->description,
                'thumbnail'=>$thumb,
            ]);
        }
        
        return response()->json(['data'=>$cate]);
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return response()->json(['data'=>'removed']);
    }
}
