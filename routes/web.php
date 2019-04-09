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

Route::get('/', 'GameController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# Show the subscriptions page
Route::get('/subscriptions','SubscriptionController@index')->name('subscriptions');

# Show the games page
Route::get('/games','GameController@index')->name('games');

Route::get('/tusers/byGame/{game_id}','TwitchUserController@findByGame');

Route::get('/tusers/{tuser_id}','TwitchUserController@viewTuser');

Route::post('/tusers/{tuser_id}/subscribe','SubscriptionController@subscribe');

Route::post('/tusers/{tuser_id}/unsubscribe','SubscriptionController@unsubscribe');

