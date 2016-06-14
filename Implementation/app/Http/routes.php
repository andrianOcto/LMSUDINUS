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
Route::get('/admin', 'AdminController@index')->middleware(['auth']);;
Route::get('/user', 'UserController@index')->middleware(['auth']);;
