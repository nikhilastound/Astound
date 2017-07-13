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


//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::post('login', 'LoginController@login');
Route::get('login', 'LoginController@getLogin')->name('login');
Route::get('register','LoginController@getRegister');
Route::post('register','LoginController@register');
Route::group(['middleware' => 'authcheck'], function() {
	Route::get('/', function () {
		return view('welcome');
	});
	Route::get('welcome', function () {
		return view('home');
	});
});
