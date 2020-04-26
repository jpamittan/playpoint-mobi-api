<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
  return redirect('/en');
});
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => ['setlocale']
  ], function () {

    Route::get('/', 'HomeController@index')->name('houmdoi');
    Route::get('tags', 'TagsController@index')->name('tag');
    Route::get('search', 'SearchController@index')->name('tag');
    Route::any('getaccount', 'AccountController@getaccount')->name('getaccount');
    Route::any('account', 'AccountController@account')->name('account');
    Route::any('cancel', 'AccountController@cancel')->name('cancel');
    Route::any('cancelpin', 'AccountController@cancelPin')->name('cancelpin');
    Route::any('logout', 'AccountController@logout')->name('logout');
    Route::any('login', 'AccountController@login')->name('login');
    Route::any('detail/{game_id}', 'DetailController@index')->name('detail');
    Route::any('getsubscription', 'AccountController@getSubscriptionUrl')->name('getsubscription');

    Route::any('contact', 'ContactController@index')->name('contact');
    Route::get('thankyou', 'ContactController@thankyou')->name('thankyou');
    Route::get('tos', 'ContactController@tos')->name('tos');
    Route::get('privacy', 'ContactController@privacy')->name('privacy');
    Route::any('payment', 'LPController@index')->name('landing');
});
