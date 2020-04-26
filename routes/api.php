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

Route::namespace('API')->group(function() {
	Route::prefix('games/')->group(function() {
		Route::get('category/{id}', 'GameController@gamesByCategory');
		Route::get('new', 'GameController@index');
		Route::get('search/{query}', 'GameController@search');
		Route::get('tags', 'GameController@tags');
	});

	Route::prefix('account/')->group(function() {
		Route::post('login', 'AccountController@login');
	});
});