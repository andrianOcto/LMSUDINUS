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
Route::get('/admin', 'Admin\AdminController@index')->middleware(['auth']);;
Route::get('/admin/user', 'Admin\UserController@index')->middleware(['auth']);
Route::post('/admin/user/create', 'Admin\UserController@createUser');
Route::post('/admin/user/update', 'Admin\UserController@updateUser');
Route::post('/admin/user/delete', 'Admin\UserController@removeUser');
Route::get('/admin/user/read', 'Admin\UserController@readUser');
