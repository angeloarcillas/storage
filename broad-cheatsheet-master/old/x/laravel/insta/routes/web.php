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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('profile', 'ProfileController');
Route::resource('post', 'PostController');

// follow/unfollow
Route::post('/follow/{profile}', 'ProfileFollowController@store');
// Route::delete('/follow/{id}', 'ProfileFollowController@destroy');
