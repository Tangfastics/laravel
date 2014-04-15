<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'Tangfastics\Controllers\ArticlesController@index']);

Route::resource('articles', 'Tangfastics\Controllers\ArticlesController');
Route::resource('users', 'Tangfastics\Controllers\UsersController');