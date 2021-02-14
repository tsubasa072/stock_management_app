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

Route::get('stock', 'StockController@top');
Route::get('stock/index', 'StockController@index');
Route::get('stock/login', 'StockController@login');
Route::get('stock/auth', 'StockController@getAuth');
Route::post('stock/auth', 'StockController@postAuth');

Route::get('stock/create', 'StockController@create');
Route::post('stock/store', 'StockController@store');


Route::get('bulk', 'BulkController@index');
Route::get('bulk/create', 'BulkController@create');
Route::post('bulk/store', 'BulkController@store');
Route::get('bulk/edit', 'BulkController@edit');
Route::post('bulk/edit', 'BulkController@edit');
Route::post('bulk/update', 'BulkController@update');
Route::get('bulk/delete', 'BulkController@delete');
Route::post('bulk/delete', 'BulkController@delete');
Route::post('bulk/destroy', 'BulkController@destroy');


Route::get('category', 'CategoryController@index');
Route::get('category/create', 'CategoryController@create');
Route::post('category/store', 'CategoryController@store');
Route::get('category/edit', 'CategoryController@edit');
Route::post('category/edit', 'CategoryController@edit');
Route::post('category/update', 'CategoryController@update');
Route::get('category/delete', 'CategoryController@delete');
Route::post('category/delete', 'CategoryController@delete');


Route::get('message', 'MessageController@index');
Route::get('message/create', 'MessageController@create');
Route::post('message/store', 'MessageController@store');
Route::get('message/edit', 'MessageController@edit');
Route::post('message/edit', 'MessageController@edit');
Route::post('message/update', 'MessageController@update');
Route::get('message/delete', 'MessageController@delete');
Route::post('message/delete', 'MessageController@delete');
Route::post('message/destroy', 'MessageController@destroy');

Route::get('buy_list', 'ListController@index');
Route::get('buy_list/create', 'ListController@create');
Route::post('buy_list/store', 'ListController@store');
Route::get('buy_list/edit', 'ListController@edit');
Route::post('buy_list/edit', 'ListController@edit');
Route::post('buy_list/update', 'ListController@update');
Route::get('buy_list/delete', 'ListController@delete');
Route::post('buy_list/delete', 'ListController@delete');
Route::post('buy_list/destroy', 'ListController@destroy');

Route::get('user', 'AuthenticationController@index');
Route::get('user/store', 'AuthenticationController@store');
Route::get('user/destroy', 'AuthenticationController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
