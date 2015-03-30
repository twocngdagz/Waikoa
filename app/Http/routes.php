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
Route::get('home', 				['as' => 'home', 'uses' => 'HomeController@index']);

// course routes
Route::get('courses',           	['as' => 'courses', 'uses' => 'CourseController@index']);
Route::get('course/create',     	['as' => 'courseCreate', 'uses' => 'CourseController@create']);
Route::post('course/create',    	'CourseController@store');
Route::get('course/edit/{id}',  	['as' => 'courseEdit', 'uses' => 'CourseController@edit'])->where('id','\d+');
Route::post('course/edit/', 		'CourseController@update');
Route::get('course/view/{id}',  	'CourseController@show')->where('id','\d+');
Route::get('course/destroy/{id}',  	'CourseController@destroy')->where('id','\d+');
Route::get('course/page/{id}',  	'CourseController@page')->where('id','\d+');

// lesson routes
Route::get('lessons',           	'LessonController@index');
Route::get('lesson/create/{id}',    ['as' => 'lessonCreate', 'uses' => 'LessonController@create']);
Route::post('lesson/store',   		['as' => 'lessonStore', 'uses' => 'LessonController@store']);

Route::get('lesson/edit/{id}',  	['as' => 'lessonEdit', 'uses' => 'LessonController@edit'])->where('id','\d+');
Route::post('lesson/edit/', 		'LessonController@update');
Route::get('lesson/view/{id}',  	'LessonController@show')->where('id','\d+');
Route::get('lesson/destroy/{id}',   'LessonController@destroy')->where('id','\d+');
Route::get('lesson/page/{id}',  	['as' => 'lessonPage', 'uses' => 'LessonController@page'])->where('id','\d+');

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
