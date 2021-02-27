<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('genres', GenreController::class);

Route::get('trashed-books', [BookController::class, 'trashed'])->name('trashed-books.index');
Route::put('restore-books/{book}', [BookController::class, 'restore'])->name('restore-books');
