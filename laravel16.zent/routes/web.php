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

//get, post, put, patch, delete
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/thoi-trang', function () {
//     echo "<h1>Thoi trang nek</h1>";
// });

// Route::get('/phim/phim-co-trang', function () {
//     echo "<h1>Phim</h1>";
// });
// 
// Route::get('/todo','TodoController@index');

// Route::get('/todo/create','TodoController@create');
// Route::post('/todos','TodoController@store');

// Route::get('/todos/{id}','TodoController@show');

// Route::get('/delete/{id}','TodoController@delete');

// Route::get('/todos/{id}/edit','TodoController@edit');
// Route::put('/todos/{id}','TodoController@update');


Route::resource('/todos-ajax','TodoAjaxController');


Route::resource('/products','ProductController');