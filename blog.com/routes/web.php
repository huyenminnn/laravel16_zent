<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/mobile', function () {
// 	$a = App\User::find(1);
// 	dd($a->mobile->mobile);    //goi ham mobile, goi ten cot cua bang
//     return view('layouts/welcome');
// });

// Route::get('/user', function () {
// 	$a = App\Mobile::find(1);
// 	dd($a->user->name);    //goi ham mobile, goi ten cot cua bang
//     return view('layouts/welcome');
// });

// Route::get('/course', function () {
// 	$a = App\User::find(1);
// 	dd($a->courses);     //tra ve 1 array
//     return view('layouts/welcome');
//});

// Route::get('/test', function () {
//     $a = App\Category::where('parent_id',0)->get();
//     dd($a);     //tra ve 1 array
//     return view('layouts/welcome');
// });
// tra ve khoa hoc ma user dang ki
// Route::get('/user-course', function () {
// 	$a = App\User::find(1);
// 	dd($a->courses);     //tra ve 1 array
//     return view('layouts/welcome');
// });
// Route::get('/user-course', function () {
// 	$a = App\Course::find(1);
// 	dd($a->user);     //tra ve 1 array
//     return view('layouts/welcome');
// });

// Route::get('/getcategories', 'CategoryController@index');

// middleware
// Route::get('/home',function(){
//     return 'ok';
// })->middleware('checkage');
// Route::get('/out',function(){
//     return 'outtttttt';
// });



//user
// Route::get('/home', 'HomeController@index')->name('home');

//dung middleware để checklogin
//admin
Route::prefix('admin')->group(function(){

    //login (khong can quan checkAuth)
    Auth::routes();

    //cac function can qua check login
    Route::middleware('auth')->group(function() {
        Route::post('/category_edit/{id}','CategoryController@update');

        Route::resource('/category','CategoryController');
        Route::get('/getdata','CategoryController@getData');
        

        Route::post('/post_edit/{id}','PostController@update');
        Route::get('/post_showedit/{id}','PostController@edit');
        Route::resource('/post','PostController');
        Route::get('/getpost','PostController@getData');

        Route::resource('/tag','TagController');
        Route::get('/gettag','TagController@getData');

        Route::resource('/user','UserController');
        Route::get('/getuser','UserController@getData');
    });
});


Route::resource('blogs','BlogController');
Route::get('/content/{id}','PostController@showContent')->name('content');




