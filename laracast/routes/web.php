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


/*
 [ METHODS ]
 GET - /project - (index) -> read
 GET - /project - (create) -> create form
 POST - /project - (store) -> create
 GET - /project/1 - (show) -> read 1
 GET - /project/1 - (edit) -> edit form
 PATCH - /project/1 - (update) -> update
 DELETE - /project/1 - (destroy) -> delete
*/

//  [ Default ]
// Route::get('/', function () {
//     return view('welcome');
// });

// [ Pass array value ]
// Route::get('/', function () {

//     return view('welcome',[
//         'foo' => 'foobar',
//         'tasks' => ['task 1','task 2','task 3']
//     ]);

    // return view('welcome',[
    //     'post'=> $posts[1] ?? 'empty']); // ?? 'empty' -> set default
// });

//ROUTE MODEL BINDING - route & model need same name

Route::get('/','PagesController@index');

//PROJECT
Route::resource('project', 'ProjectsController');
// Route::resource('project', 'ProjectsController')->middleware('can:view,project');

/* !note: this is SAME as Route::resource
Route::get('/project','ProjectsController@index'); //show all
Route::get('/project/create','ProjectsController@create'); //create formm
Route::post('/project','ProjectsController@store'); //create
Route::get('/project/{project}','ProjectsController@show'); //show 1
Route::get('/project/{project}/edit','ProjectsController@edit'); //edit form
Route::patch('/project/{project}','ProjectsController@update'); //update
Route::delete('/project/{project}','ProjectsController@destroy'); //delete
*/

//TASK
Route::resource('task', 'TaskController');

//PROJECT TASK
Route::post('/project/{project}/task', 'ProjectTaskController@store');

//COMPLETE TASK
Route::post('/complete-task/{task}', 'CompletedTasksController@store');
Route::delete('/complete-task/{task}', 'CompletedTasksController@destroy');

// PAGE PATH
use App\Notifications\SubscriptionRenewalFailed;
Route::get('/about', function () {

    $user = App\User::first();
    $user->notify(new SubscriptionRenewalFailed);
    return view('layouts/about');
});

Route::get('/contact', function () {
    // session()->flash('success', 'Task was successful!');
    flash('Task was successful!');
    return view('layouts/contact');
});

//     //custom function
// function flash($message) {
//     session()->flash('success', $message);

// }





// [ CORE CONCEPT ]

// Route::get('/', function () {
//     dd(app('test'),app('App\Project'));
// });

// [ Service Container ]

// app()->bind('test',function () { //bind test to app
//  return new App\Task;
// });

    // singleton for 1 same results
// app()->singleton('test',function () {
//     return new App\Task;
//    });

    // using bar
// app()->singleton('bar',function () {
//     return new \App\Services\Bar('xzczxczxczcx');
//    });

    // using class
// app()->singleton('App\Services\Bar',function () {
//     return new \App\Services\Bar('xzczxczxczcx');
//    });

// [ SERVICE PROVIDERS ]
// use App\Services\Bar;

// Route::get('/', function (Bar $test) {
//     dd($test);
// });

    // Interface
// use App\Repositories\UserRepository;
// Route::get('/', function (UserRepository $test) {
//         dd($test);
//     });

// [ Config/ENV ]
// use App\Services\Bar;

// Route::get('/', function (Bar $bar) {
//     dd($bar);
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/**
 *  [ COLLECTION ]
 * map() -https://laravel.com/docs/6.x/collections#method-map
 * filter() -https://laravel.com/docs/6.x/collections#method-filter
 */


// [ Testing ]
// Route::middleware('auth')->post('/teams', function () {
//
//     auth()->user()->team()->create(request()->validate([
//         'name' => 'required'
//     ]));
//
//     return redirect('/');
// });



// [ Add route name ]
// route('route.name',$wildcard)
// Route::resource('article', 'ArticleController')->name('article.index');