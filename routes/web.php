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

Route::get('/','productController@home');
Route::get('products','productController@home');
Route::post('store','productController@store');
Route::get('test','productController@view');
Route::get('ajax/search','productController@search');
Route::get('product/add/{id}','productController@edit');
Route::post('product/img','productController@img');
