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

Route::prefix('admin')
	->namespace('Admin')
	->group(function() {
		Route::get('product/datatable', 'ProductController@datatable')
			->name('product.datatable');
		Route::get('product/edit/{product}', 'ProductController@edit')
			->name('product.edit');
		Route::resource('product', 'ProductController')->except([
			'edit'
		]);
	});

