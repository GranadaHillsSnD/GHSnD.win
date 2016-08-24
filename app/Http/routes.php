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

Route::get('/updates', 'FeedController@showTeamUpdates');

Route::get('/about', 'FeedController@showAbout');

Route::get('/calendar', 'CalendarController@index');

Route::get('/staff', function() {
  return view('staff');
});

Route::get('/resources', function() {
  return view('resources');
});

Route::get('/apparel', function() {
  return view('apparel');
});

Route::post('/subscribe', ['as' => 'subscribe.success', 'uses' => 'SubscriberController@store']);

Route::get('verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'SubscriberController@confirm'
]);

Route::get('unsubscribe/{unsubscribeCode}', [
    'as' => 'unsubscribe_path',
    'uses' => 'SubscriberController@unsubscribe'
]);
// Authentication routes...
Route::get('/admin/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/admin/login', ['as' => 'auth.login', 'uses' =>'Auth\AuthController@postLogin']);

Route::get('/admin/logout', 'Auth\AuthController@getLogout');
Route::get('/admin/pending', ['as' => 'auth', 'uses' => 'AdminController@pending']);

Route::patch('/admin/media/deny/{id}', ['as' => 'media.deny', 'uses' => 'SocialMediaController@deny']);
Route::patch('/admin/media/approve/{id}', ['as' => 'media.approve', 'uses' => 'SocialMediaController@approve']);

Route::get('/admin/approved', 'AdminController@showApproved');
Route::get('/admin/denied', 'AdminController@showDenied');

Route::get('/admin/calendar', 'AdminController@addEvent');
Route::post('/admin/calendar', 'CalendarController@store');

Route::get('/admin/post/new', 'AdminController@addPost');
Route::post('/admin/post/new', 'AdminController@storePost');
Route::get('/admin/post/edit/{id}', ['as' => 'post.edit', 'uses' => 'AdminController@showPost']);
Route::post('/admin/post/edit/{id}', ['as' => 'post.edit', 'uses' => 'AdminController@update']);
Route::get('admin/post/edit', 'AdminController@showPosts');
