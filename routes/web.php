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
Route::resource('/books', 'Book\BookController');
Route::resource('/comments', 'Book\CommentController')->except([
    'show'
]);
Route::get('/cat/{id}','Book\BookController@getSameCat');
Route::get('/rate','Book\RateController@store');
Route::get('/fav','Book\FavoriteController@storeOrUpdate');
Route::get('/lease','Book\LeaseController@store');
Route::get('/home', 'HomeController@index')->name('home');
