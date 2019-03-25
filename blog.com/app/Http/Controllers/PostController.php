<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use Carbon\Carbon;
use App\User;
use App\Category;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('manager.post');
    }
    public function getData(){
        // $posts = Post::orderBy('id', 'asc')->get();
        $posts = Post::get();
        return Datatables::of($posts)
            ->addColumn('action', function ($post) {
                return '<button type="button" class="btn btn-success btn-show" data-id="'.$post->id.'">Detail</button>
                        <button type="button" class="btn btn-warning btn-edit" data-id="'.$post->id.'">Edit</button>
                        <button type="button" class="btn btn-danger btn-delete" data-id="'.$post->id.'">Delete</button>';})
            // ->editColumn('created_at', function($post) {
            //     $now = Carbon::now();
            //     return $post->created_at->diffForHumans($now);
            // })
            ->editColumn('updated_at', function($post) {
                $now = Carbon::now();
                return $post->updated_at->diffForHumans($now);
            })
            ->editColumn('user_id', function($post) {
                return $post->user->name;
            })
            ->editColumn('category_id', function($post) {
                return $post->cate->name;
                // dd($post->categories);
            })->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $thumb = $request->thumbnail->storeAs('images',$request->thumbnail->getClientOriginalName());
        $post->thumbnail = $thumb;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->view_count = $request->view_count;
        
        $post->save();
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $post->category_id = $post->cate->name;
        $post->user_id = $post->user->name;
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post=Post::find($id);
        if ($request->thumbnail == 'none') {
            $post->update([
                'title'=>$request->title,
                'content'=>$request->content,
                'slug'=>$request->slug,
                'description'=>$request->description,
                'category_id'=>$request->category_id,
                'user_id'=>$request->user_id,
            ]);
        }else{
            $thumb = $request->thumbnail->storeAs('images',$request->thumbnail->getClientOriginalName());
            $post->update([
                'title'=>$request->title,
                'content'=>$request->content,
                'slug'=>$request->slug,
                'description'=>$request->description,
                'category_id'=>$request->category_id,
                'user_id'=>$request->user_id,
                'thumbnail'=>$thumb,
            ]);
        }
        return response()->json(['data'=>$post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json(['data'=>'removed']);
    }

    //show Blog
    public function showContent($id){
        $post = Post::find($id);
        return view('blogs/content',['post'=>$post]);
    }
}
