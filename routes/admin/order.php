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
	->middleware('employee')
	->group(function() {
		Route::get('order/datatable', 'OrderController@datatable')
			->name('order.datatable');
		Route::get('order/edit/{order}', 'OrderController@edit')
			->name('order.edit');
		Route::resource('order', 'OrderController')->except([
			'edit'
		]);
	});

