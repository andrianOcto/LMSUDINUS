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
Route::get('/admin/user/read/{role?}/{course?}', 'Admin\UserController@readUser')->middleware(['auth']);

Route::get('/admin/user/import', 'Admin\UserController@indexImport')->middleware(['auth']);
Route::post('/admin/user/importUser', 'Admin\UserController@importUser')->middleware(['auth']);


//course route
Route::get('/admin/course', 'Admin\CourseController@index')->middleware(['auth']);
Route::get('/admin/course/read', 'Admin\CourseController@readCourse')->middleware(['auth']);
Route::post('/admin/course/create', 'Admin\CourseController@createCourse')->middleware(['auth']);
Route::post('/admin/course/update', 'Admin\CourseController@updateCourse')->middleware(['auth']);
Route::post('/admin/course/delete', 'Admin\CourseController@removeCourse')->middleware(['auth']);

Route::get('/admin/course/import', 'Admin\CourseController@indexImport')->middleware(['auth']);
Route::post('/admin/course/importCourse', 'Admin\CourseController@importCourse')->middleware(['auth']);

//enroll user
Route::get('/admin/enroll/', 'Admin\EnrollController@index')->middleware(['auth']);
Route::get('/admin/enroll/read/{role}/{course}', 'Admin\EnrollController@readUser')->middleware(['auth']);
Route::post('/admin/enroll/addUserCourse', 'Admin\EnrollController@addUserCourse')->middleware(['auth']);
Route::post('/admin/enroll/deleteUserCourse', 'Admin\EnrollController@deleteUserCourse')->middleware(['auth']);

//lecturer
Route::get('/dosen', 'Dosen\DosenController@index')->middleware(['auth']);
Route::get('/dosen/outline/{id}', 'Dosen\DosenController@outline')->middleware(['auth']);
Route::get('/dosen/materi/{id}/{type}', 'Dosen\DosenController@materi')->middleware(['auth']);
//proses lecturer
Route::post('/dosen/newmateri/{id}', 'Dosen\DosenController@createMateri')->middleware(['auth']);
Route::get('/dosen/newsection/{id}', 'Dosen\DosenController@createSection')->middleware(['auth']);
