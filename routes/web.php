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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/bbc','PostsController');

Route::post('/bbc/comments','CommentsController@store');

Route::get('/bbc/create', 'PostsController@create');
Route::post('/bbc/posts', 'PostsController@store');
Route::get('/bbc/{id}','PostsController@show');


Route::get('/catrgory/{id}', 'PostsController@showCategory');


//Route::get('/bbc/create', function(){
//    return view('bbc.create');
//});




//Route::resource('/bbc'.);