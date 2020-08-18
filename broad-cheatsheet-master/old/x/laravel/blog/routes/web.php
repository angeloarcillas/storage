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

Route::get('/', 'QuestionsController@index');
Route::get('/sass', function() {
    return view('sass');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// [ QUESTION ]
Route::resource('questions', 'QuestionsController')->except('show');
Route::get('/questions/{slug}', 'QuestionsController@show')->name('questions.show');

// [ ANSWER ]
Route::resource('questions.answers', 'AnswerController')->except('index', 'create', 'show');
Route::post('/answers/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');

// [ FAVORITE ]
Route::post('/questions/{question}/favorites', 'FavoriteController@store')->name('questions.favotite');
Route::delete('/questions/{question}/favorites', 'FavoriteController@destroy')->name('questions.unfavotite');

// [ VOTE ]
Route::post('/questions/{question}/vote', 'VoteQuestionController');
Route::post('/answers/{answer}/vote', 'VoteAnswerController');
