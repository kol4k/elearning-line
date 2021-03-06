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
Route::post('/register', 'API\V1\UserController@store')->name('register');

Route::group(['prefix' => '/v1'], function () {
    Route::resource('tasks', 'API\V1\TaskController');
    Route::resource('categories', 'API\V1\CategoryController');
});

Route::get('/get-message', function (Request $request) {    
    logger("message request : ", $request->all());
});
Route::post('/get-message', ['as' => 'line.bot.message', 'uses' => 'LineMessageController@getMessage']);
