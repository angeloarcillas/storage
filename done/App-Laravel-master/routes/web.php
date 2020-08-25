<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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


Route::view('/','welcome');
Route::view('/contact','contact');
Route::view('/about','about');

Route::resource('/articles','ArticlesController');
Route::post('/articletag', function ()
{
  DB::table('article_tag')->insert(
    [
        'article_id' => \App\Article::pluck('id')->random(),
        'tag_id' => \App\Tag::pluck('id')->random()
    ]
  );
  return redirect('/');
});

Route::post('/xarticletag', function ()
{
  DB::table('article_tag')->insert(
    [
        'article_id' => 99,
        'tag_id' => 88
    ]
  );
  return redirect('/');
});

// // named routes | access => route('article.show)
// route::get('/articles/{article}','ArticlesController@edit')->name('article.edit');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
