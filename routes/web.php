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
    Route::get('/register', 'Pages\GuestController@register')->name('page.register');
    Route::get('/profile', 'Pages\AdministratorController@myProfile')->name('page.profile');
    Route::resource('tasks', 'WEB\V1\TaskController', ['except' => [
        'destroy'
    ]]);
    Route::get('/tasks/{id}/delete', 'WEB\V1\TaskController@destroy')->name('tasks.destroy');
    Route::resource('categories', 'WEB\V1\CategoryController', ['except' => [
        'destroy'
    ]]);
    Route::get('/categories/{id}/delete', 'WEB\V1\CategoriesController@destroy')->name('categories.destroy');    
    // Route::get('/','Pages\AdministratorController@dashboard');
    // Route::group(['prefix' => '/users'], function () {
    //     Route::get('/','Pages\AdministratorController@usersPage')->name('users.index');
    // });
    // Route::group(['prefix' => '/tasks'], function () {
        // Route::get('/','Pages\AdministratorController@taskPage')->name('task.index');
        // Route::get('/add','Pages\AdministratorController@taskNew')->name('task.new');
        // Route::get('/{id}','Pages\AdministratorController@taskEdit')->name('task.edit');
        // Route::post('/', 'WEB\V1\TaskController@store')->name('web.task.store');
        // Route::post('/{id}', 'WEB\V1\TaskController@update')->name('web.task.update');
        // Route::get('/{id}/delete', 'WEB\V1\TaskController@destroy')->name('web.task.delete');
        // Route::group(['prefix' => '/category'], function () {
        //     Route::post('/store', 'WEB\V1\CategoryController@store')->name('web.category.store');
        //     Route::get('/{id}','Pages\AdministratorController@categoryEdit')->name('views.category.edit');
        //     Route::post('/{id}', 'WEB\V1\CategoryController@update')->name('web.category.update');
        //     Route::get('/{id}/delete', 'WEB\V1\CategoryController@destroy')->name('web.category.delete');
        // });
    // });
});