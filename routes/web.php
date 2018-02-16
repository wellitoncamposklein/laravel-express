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
//Route::resource('admin/posts','PostsAdminController');

Route::get('/','PostController@index');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/','PostsAdminController@index')->name('admin.index');
    Route::get('create','PostsAdminController@create')->name('admin.create');
    Route::post('store','PostsAdminController@store')->name('admin.store');
    Route::get('edit/{id}','PostsAdminController@edit')->name('admin.edit');
    Route::put('update/{id}','PostsAdminController@update')->name('admin.update');
    Route::get('destroy/{id}','PostsAdminController@destroy')->name('admin.destroy');
});