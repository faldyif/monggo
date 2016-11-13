<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    if(Auth::user()->guest) {
        return Redirect::to('login');
    }
    return Redirect::to('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('profile', 'ProfileController', ['except' => ['create']]);
Route::resource('follow', 'FollowController', ['only' => ['show']]);
Route::resource('unfollow', 'UnfollowController', ['only' => ['show']]);
Route::resource('status', 'StatusController', ['only' => ['store']]);
Route::get('/like/{like}', 'LikeController@like');
Route::get('/dislike/{dislike}', 'LikeController@dislike');
