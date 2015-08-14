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

Route::get('/', 'FeedController@showLatestFeed');

// Authentication routes...
Route::get('/admin/login', 'Auth\AuthController@getLogin');
Route::post('/admin/login', 'Auth\AuthController@postLogin');
Route::get('/admin/logout', 'Auth\AuthController@getLogout');
Route::get('/admin', 'AdminController@index');

Route::patch('/admin/media/deny/{id}', ['as' => 'media.deny', 'uses' => 'SocialMediaController@deny']);
Route::patch('/admin/media/approve/{id}', ['as' => 'media.approve', 'uses' => 'SocialMediaController@approve']);
Route::get('/admin/approved', 'AdminController@showApproved');
Route::get('/admin/denied', 'AdminController@showDenied');

Route::get('/instagram', 'SocialMediaController@getInstagrams');

Route::get('/twitter', 'SocialMediaController@getTweets');

Route::get('/calendar', 'CalendarController@getCalendarEvents');
