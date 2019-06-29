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
	Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
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

Route::prefix('admin')->group(function (){
	Route::get('category', 'CategoryController@index')->name('category.index');
	Route::get('category/create', 'CategoryController@create')->name('category.create');
	Route::post('category', 'CategoryController@store')->name('category.store');
	Route::get('category/{id}/edit', 'CategoryController@edit')->name('category.edit');
	Route::put('category/{id}', 'CategoryController@update')->name('category.update');
	Route::delete('category/{id}', 'CategoryController@destroy')->name('category.destroy');
	Route::get('category/json_category', 'CategoryController@json_category');
});

Route::prefix('admin')->group(function (){
	Route::get('item', 'ItemController@index')->name('item.index');
	Route::get('item/create', 'ItemController@create')->name('item.create');
	Route::post('item', 'ItemController@store')->name('item.store');
	Route::get('item/{id}/edit', 'ItemController@edit')->name('item.edit');
	Route::put('item/{id}', 'ItemController@update')->name('item.update');
	Route::delete('item/{id}', 'ItemController@destroy')->name('item.destroy');
	Route::get('trash', 'ItemController@trash')->name('item.trash');
	Route::delete('trash/{id}', 'ItemController@forceDelete')->name('item.forceDelete');
	Route::get('item/json_item', 'ItemController@json_item');
});

Route::prefix('admin')->group(function (){
	Route::get('member', 'MemberController@index')->name('member.index');
	Route::get('member/create', 'MemberController@create')->name('member.create');
	Route::post('member', 'MemberController@store')->name('member.store');
	Route::get('member/{id}/edit', 'MemberController@edit')->name('member.edit');
	Route::put('member/{id}', 'MemberController@update')->name('member.update');
	Route::delete('member/{id}', 'MemberController@destroy')->name('member.destroy');
	Route::get('member/json_member', 'MemberController@json_member');
});

Route::prefix('admin')->group(function (){
	Route::get('status', 'StatusController@index')->name('status.index');
	Route::get('status/create', 'StatusController@create')->name('status.create');
	Route::post('status', 'StatusController@store')->name('status.store');
	Route::get('status/{id}/edit', 'StatusController@edit')->name('status.edit');
	Route::put('status/{id}', 'StatusController@update')->name('status.update');
	Route::delete('status/{id}', 'StatusController@destroy')->name('status.destroy');
	Route::get('status/json_status', 'StatusController@json_status');
});

Route::prefix('admin')->group(function (){
	Route::get('debt', 'DebtController@index')->name('debt.index');
	Route::get('debt/create', 'DebtController@create')->name('debt.create');
	Route::post('debt', 'DebtController@store')->name('debt.store');
	Route::get('debt/{id}/edit', 'DebtController@edit')->name('debt.edit');
	Route::put('debt/{id}', 'DebtController@update')->name('debt.update');
	Route::delete('debt/{id}', 'DebtController@destroy')->name('debt.destroy');
	Route::get('debt/json_debt', 'DebtController@json_debt');
});
