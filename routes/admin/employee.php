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
	->middleware('super')
	->group(function() {
		Route::get('employee/datatable', 'EmployeeController@datatable')
			->name('employee.datatable');
		Route::get('employee/edit/{employee}', 'EmployeeController@edit')
			->name('employee.edit');
		Route::resource('employee', 'EmployeeController')->except([
			'edit'
		]);
	});

