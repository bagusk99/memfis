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

Route::prefix('admin/product')
	->name('product.')
	->namespace('Admin')
	->group(function() {
		Route::get('datatable', 'ProductController@datatable')
			->name('datatable');
		Route::resource('', 'ProductController');
	});
