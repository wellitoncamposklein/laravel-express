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

//Route::resource('/','PostController');
//
//Route::resource('admin','PostsAdminController');

Route::get('/','PostController@index');

Route::get('admin/posts','PostsAdminController@index')->name('admin.index');
Route::get('admin/posts/create','PostsAdminController@create')->name('admin.posts.create');
Route::post('admin/posts/store','PostsAdminController@store')->name('admin.posts.store');