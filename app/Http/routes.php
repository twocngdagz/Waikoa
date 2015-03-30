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
Route::post('course/create',    'CourseController@store');
Route::get('course/edit/{id}',  'CourseController@edit')->where('id','\d+');
Route::post('course/edit/', 	'CourseController@update');
Route::get('course/view/{id}',  'CourseController@show')->where('id','\d+');
Route::get('course/destroy/{id}',  'CourseController@destroy')->where('id','\d+');
Route::get('course/page/{id}',  'CourseController@page')->where('id','\d+');

// lesson routes
Route::get('lessons',           'LessonController@index');
Route::get('lesson/create/{id}',     'LessonController@create')->where('id','\d+');
Route::post('lesson/create/{id}',    'LessonController@store')->where('id','\d+');

Route::get('lesson/edit/{id}',  'LessonController@edit')->where('id','\d+');
Route::post('lesson/edit/', 	'LessonController@update');
Route::get('lesson/view/{id}',  'LessonController@show')->where('id','\d+');
Route::get('lesson/destroy/{id}',  'LessonController@destroy')->where('id','\d+');
Route::get('lesson/page/{id}',  'LessonController@page')->where('id','\d+');

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

// message board
Route::get('board',             'BoardController@index');
Route::post('board/comment',    'BoardController@add');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
