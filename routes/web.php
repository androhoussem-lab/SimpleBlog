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

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('home/{id}','HomeController@show');


Route::middleware(['auth','user_is_admin'])->group(function (){
    //Users
    Route::get('users','UserController@index')->name('users');
    Route::get('user/{id}','UserController@show')->name('user');
    Route::delete('users','UserController@delete');//
    //Posts
    Route::get('posts','PostController@index')->name('posts');
    Route::get('post/{id}','PostController@show')->name('post');

    //Review
    Route::get('reviews','ReviewController@index')->name('reviews');
    Route::get('review/{id}','ReviewController@show')->name('review');
});
Route::get('error/not/admin',function (){
   return view('errors.notadmin');
})->name('admin-error');
Route::get('error/not/blogger',function (){
    return view('errors.notblogger');
})->name('blogger-error');

