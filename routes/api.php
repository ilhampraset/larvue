<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');

Route::middleware(['cors'])->namespace('API')->group(function() {

	Route::prefix('users')->group(function() {
		Route::get('/', 'UserController@index');
		Route::get('get/{id?}', 'UserController@get');

		Route::post('add', 'UserController@add');
		Route::put('edit/{id}', 'UserController@edit');

		Route::delete('delete/{id}', 'UserController@delete');
	});

	Route::prefix('employees')->group(function() {
		Route::get('/', 'EmployeeController@index');
		Route::get('get/{id}', 'EmployeeController@get');

		Route::post('add', 'EmployeeController@add');
		Route::put('edit/{id}', 'EmployeeController@edit');

		Route::delete('delete/{id}', 'EmployeeController@delete');
	});

});
