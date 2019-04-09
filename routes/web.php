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

# Show the manage subscriptions view
Route::get('/tuser_manage_subscriptions', 'SubscriptionController@tuser_manage_subscriptions')
  ->name('tuser_manage_subscriptions');
Route::post('/tuser_manage_subscriptions/{tuser_id}/unsubscribe', 'SubscriptionController@unsubscribe')->name('tuser_manage_subscriptions_unsubscribe');

Route::get('/tusers/byGame/{game_id}','TwitchUserController@findByGame');

Route::get('/tusers/{tuser_id}','TwitchUserController@viewTuser');

Route::post('/tusers/{tuser_id}/subscribe','SubscriptionController@subscribe');

Route::post('/tusers/{tuser_id}/unsubscribe','SubscriptionController@unsubscribe')
  ->name('tuser_unsubscribe');

