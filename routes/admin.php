<?php

Route::group(['namespace' => 'Admin'], function () {

    // Route::group(['middleware' => ['admin.auth:admin']], function () {

        Route::get('/', 'HomeController@index')->name('admin.dashboard');
         Route::resource('/admins', 'AdminController');
        // Route::resource('/books', 'BookController');

    // });




});
