<?php

Route::group(['namespace' => 'Admin'], function () {

    // Route::group(['middleware' => ['admin.auth:admin']], function () {

        Route::get('/', 'HomeController@index')->name('admin.dashboard');
        // Route::get('/users/archive',        ['as' => 'users.archive',   'uses' => 'UserController@archive']);
        // Route::PATCH('/users/restore/{id}', ['as' => 'users.restore',   'uses' => 'UserController@restore']);
        // Route::Delete('/users/delete/{id}', ['as' => 'users.delete',    'uses' => 'UserController@destroyFinal']);
        // Route::resource('/users', 'UserController');
         Route::resource('/admins', 'AdminController');
        Route::resource('/books', 'BookController');
        // Route::resource('/categories', 'CategoryController');
        // Route::resource('/projects', 'ProjectController');
        // Route::resource('/sections', 'SectionController');
        // Route::resource('/departments-files', 'DepartmentFileController');
        // Route::resource('/tasks', 'TaskController');
        // Route::resource('/buildings', 'BuildingController');
        // Route::resource('/leases', 'LeaseController');

    // });




});
