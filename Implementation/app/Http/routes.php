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

Route::auth();

Route::get('/', 'HomeController@index')->middleware(['auth']);

//admin
Route::get('/admin', 'Admin\AdminController@index')->middleware(['auth']);;

//user route
Route::get('/admin/user', 'Admin\UserController@index')->middleware(['auth']);
Route::post('/admin/user/create', 'Admin\UserController@createUser')->middleware(['auth']);
Route::post('/admin/user/update', 'Admin\UserController@updateUser')->middleware(['auth']);
Route::post('/admin/user/delete', 'Admin\UserController@removeUser')->middleware(['auth']);
Route::get('/admin/user/read', 'Admin\UserController@readUser')->middleware(['auth']);

//course route
Route::get('/admin/course', 'Admin\CourseController@index')->middleware(['auth']);
Route::get('/admin/course/read', 'Admin\CourseController@readCourse')->middleware(['auth']);
Route::post('/admin/course/create', 'Admin\CourseController@createCourse')->middleware(['auth']);
Route::post('/admin/course/update', 'Admin\CourseController@updateCourse')->middleware(['auth']);
Route::post('/admin/course/delete', 'Admin\CourseController@removeCourse')->middleware(['auth']);

//enroll user
Route::get('/admin/enroll', 'Admin\EnrollController@index')->middleware(['auth']);
Route::get('/admin/enroll/read/{courseId}/{roleId}', 'Admin\EnrollController@readUser')->middleware(['auth']);
