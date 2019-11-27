<?php

use App\Book;
use App\Author;
use App\Shop;

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

Route::get('books', function () {
    return view('books', ['books' => Book::all()]);
})->name('books');

Route::get('authors', function () {
    return view('authors', ['authors' => Author::all()]);
})->name('authors');

Route::get('shops', function () {
    return view('shops', ['shops' => Shop::all()]);
})->name('shops');