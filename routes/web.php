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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => '/'], function () {
    Route::get('/','Pages\AdministratorController@dashboard');
    Route::group(['prefix' => '/users'], function () {
        Route::get('/','Pages\AdministratorController@usersPage')->name('users.index');
    });
    Route::group(['prefix' => '/exam'], function () {
        Route::get('/','Pages\AdministratorController@examPage')->name('exam.index');
    });
});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
