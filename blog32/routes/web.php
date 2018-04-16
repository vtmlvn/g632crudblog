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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'PostController@index')->name('post.index');
Route::post('/post/create/store', 'PostController@store')->name('post.store');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::get('/post/{post}', 'PostController@view')->name('post.view');


Route::middleware('auth')->group(function(){

    Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::patch('/post/{post}/edit', 'PostController@update')->name('post.update');
    Route::delete('/post/{post}/delete', 'PostController@destroy')->name('post.destroy');
    Route::post('/post/{post}/comment', 'CommentController@store')->name('comment.store');
});
