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

Route::get('/login', 'HomeController@login')->name('home.login');
Route::post('/login','HomeController@postLogin')->name('home.postLogin');
Route::get('/logout','HomeController@logout')->name('home.logout');

Route::group(['middleware'=>'CheckStudent'], function () {
    Route::get('/','HomeController@index')->name('home.index');
    Route::post('/','HomeController@submitMajor')->name('home.submit');
});

Route::get('/admin', 'AdminController@login')->name('admin.login');
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/login','AdminController@postLogin')->name('admin.postLogin');
Route::get('admin/logout','AdminController@logout')->name('admin.logout');

Route::group(['prefix'=> 'admin', 'middleware'=>'CheckLogin'], function () {
//Group user
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('user.list');
        Route::get('create', 'UserController@create')->name('user.create');
        Route::post('create', 'UserController@store')->name('user.store');
        Route::delete('delete/{id}', 'UserController@destroy')->name('user.delete');
//    Route::get('edit/{id}', 'UserController@show')->name('major.show');
//    Route::post('edit/{id}', 'UserController@update')->name('major.update');
    });
//Group major
    Route::group(['prefix' => 'major'], function () {
        Route::get('/', 'MajorController@index')->name('major.list');
        Route::get('create', 'MajorController@create')->name('major.create');
        Route::post('create', 'MajorController@store')->name('major.store');
        Route::delete('delete/{id}', 'MajorController@destroy')->name('major.delete');
//    Route::get('edit/{id}', 'MajorController@show')->name('major.show');
//    Route::post('edit/{id}', 'MajorController@update')->name('major.update');
//    Route::delete('deleteAll', 'MajorController@deleteSelected')->name('major.deleteSelected');
        Route::post('/', 'MajorController@import')->name('major.import');
        Route::get('export', 'MajorController@export')->name('major.export');

    });
//Group student
    Route::group(['prefix' => 'student'], function () {
        Route::get('/', 'StudentController@index')->name('student.list');
        Route::get('create', 'StudentController@create')->name('student.create');
        Route::post('create', 'StudentController@store')->name('student.store');
//    Route::get('edit/{id}', 'StudentController@show')->name('major.show');
//    Route::post('edit/{id}', 'StudentController@update')->name('major.update');
//    Route::get('delete/{id}', 'StudentController@delete')->name('major.delete');
        Route::delete('delete/{id}', 'StudentController@destroy')->name('student.delete');
        Route::post('/', 'StudentController@import')->name('student.import');
        Route::get('export', 'StudentController@export')->name('student.export');
    });
//Group registration
    Route::group(['prefix' => 'registration'], function () {
        Route::get('/', 'AdminController@manageRegistration')->name('admin.manageRegistration');
//        Route::get('create', 'StudentController@create')->name('student.create');
        Route::post('/', 'AdminController@updateRegistration')->name('admin.updateRegistration');
//    Route::get('edit/{id}', 'StudentController@show')->name('major.show');
//    Route::post('edit/{id}', 'StudentController@update')->name('major.update');

    });
});

