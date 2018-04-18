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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('input_transaction.show');
    Route::post('/daily_transaction/store', 'DailyTransaction@store')->name('daily_transaction.store');

    Route::get('/user', 'UserController@manage')->name('user.manage');
    Route::get('/user/add', 'UserController@add')->name('user.add');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::patch('/user/update/{id}', 'UserController@update')->name('user.update');
    Route::post('/user/store', 'UserController@store')->name('user.store');
    Route::delete('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');

    Route::get('/report', 'DailyTransaction@show')->name('report.show');
    Route::get('/report/edit/{id}', 'DailyTransaction@edit')->name('report.edit');
    Route::patch('/report/update/{id}', 'DailyTransaction@update')->name('report.update');
    Route::delete('/report/destroy/{id}', 'DailyTransaction@destroy')->name('report.destroy');
});