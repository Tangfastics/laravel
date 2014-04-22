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

Route::get('articles/views', ['as' => 'articles.views', 'uses' => 'Tangfastics\Controllers\ArticlesController@index']);
Route::get('articles/rating', ['as' => 'articles.rating', 'uses' => 'Tangfastics\Controllers\ArticlesController@index']);
Route::resource('articles', 'Tangfastics\Controllers\ArticlesController');

Route::resource('users', 'Tangfastics\Controllers\UsersController');

//Auth Routes
Route::get('login', [
	'as' => 'auth.index',
	'uses' => 'Tangfastics\Controllers\AuthController@getIndex'
]);
Route::post('login', [
	'as' => 'auth.login',
	'uses' => 'Tangfastics\Controllers\AuthController@postLogin'
]);
Route::get('logout', [
	'as' => 'auth.logout',
	'uses' => 'Tangfastics\Controllers\AuthController@getLogout'
]);

Route::get('categories/{category_slug}', [
        'as'   => 'categories.show',
        'uses' => 'Tangfastics\Controllers\ArticlesController@showCategory'
]);

Route::get('tags/{tag_slug}', [
        'as'   => 'tags.show',
        'uses' => 'Tangfastics\Controllers\ArticlesController@showTag'
]);