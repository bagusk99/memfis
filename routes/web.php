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
Route::middleware('customer')->group(function() {

});

Route::get('/', 'AppController@index')->name('/');
Route::get('/product/{id}', 'AppController@product')->name('product');
