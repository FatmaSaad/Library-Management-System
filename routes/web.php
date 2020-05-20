<?php

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/book/{id}', 'BookController@BooksByCategory')->name('books by category');
    Route::get('/book', 'BookController@index')->name('search for book');
    Route::get('/search', 'BookController@search');
    Route::get('/cat/{id}', 'BookController@getSameCat');
    Route::resource('/books', 'BookController')->only([
        'show'
    ]);
    Route::resource('/comments', 'CommentController')->except(['show']);
    Route::get('/rate', 'RateController@store');
    Route::get('/fav', 'FavoriteController@storeOrUpdate');
    Route::get('/lease', 'LeaseController@store');
});
