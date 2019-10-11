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
		Route::get('customer/datatable', 'CustomerController@datatable')
			->name('customer.datatable');
		Route::get('customer/edit/{customer}', 'CustomerController@edit')
			->name('customer.edit');
		Route::resource('customer', 'CustomerController')->except([
			'edit'
		]);
	});

