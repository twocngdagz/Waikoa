<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',                 'WelcomeController@index');
Route::get('home',              'HomeController@index');

// course routes
Route::get('courses',           'CourseController@index');
Route::get('course/create',     'CourseController@create');
Route::post('course/create',     'CourseController@create');
Route::get('course/edit/{id}',  'CourseController@edit')->where('id','\d+');
Route::post('course/update',    'CourseController@update');

// user routes
Route::get('users',             'UserController@index');
Route::get('user/edit/{id}',    'UserController@edit')->where('id','\d+');
Route::post('user/update',      'UserController@update');
Route::get('user/profile',      'UserController@getProfile')->where('id','\d+');
Route::post('user/profile',     'UserController@saveProfile');


Route::post('pay',              'PaymentController@pay');
Route::get('success',           'PaymentController@successPayment');

// role routes
Route::get('roles',             'RoleController@index');
Route::get('role/edit/{id}',    'RoleController@edit')->where('id', '\d+');
Route::post('role/update',      'RoleController@update');
Route::get('role/create',       'RoleController@create');
Route::post('role/save',        'RoleController@save');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
