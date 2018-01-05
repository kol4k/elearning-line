<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => '/v1'], function () {
    Route::group(['prefix' => '/task'], function () {
        Route::post('/','API\V1\TaskController@store')->name('task.store');
        Route::get('/','API\V1\TaskController@index')->name('task.all');
    });
    Route::group(['prefix' => '/category'], function () {
        Route::post('/','API\V1\CategoryController@store')->name('category.store');
        Route::get('/','API\V1\CategoryController@index')->name('category.all');
    });
});

Route::get('/get-message', function (Request $request) {    
    logger("message request : ", $request->all());
});
Route::post('/get-message', ['as' => 'line.bot.message', 'uses' => 'LineMessageController@getMessage']);
