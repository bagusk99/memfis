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
Route::prefix('auth')
	->name('auth.')
	->middleware('not.login')
	->group(function() {
		Route::get('login', 'AuthController@login')->name('login');
		Route::post('login', 'AuthController@do_login')->name('do_login');
		Route::get('register', 'AuthController@register')->name('register');
		Route::post('register', 'AuthController@do_register')
			->name('do_register');
});

Route::get('auth/logout', 'AuthController@logout')->name('auth.logout');
