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

Route::prefix('admin')->group(function (){
	Route::get('user', 'UserController@index')->name('user.index');
	Route::get('user/create', 'UserController@create')->name('user.create');
	Route::post('user', 'UserController@store')->name('user.store');
	Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
	Route::put('user/{id}', 'UserController@update')->name('user.update');
	Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
	Route::get('user/json_user', 'UserController@json_user');
});
