<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::post('/books', [BookController::class, 'store']);
// Route::patch('/books/{book}', [BookController::class, 'update']);
// Route::delete('/books/{book}', [BookController::class, 'destroy']);
Route::resource('books', BookController::class);
Route::post('/authors', [AuthorController::class, 'store']);
