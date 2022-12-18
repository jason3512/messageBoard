<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', 'App\Http\Controllers\MessageController@index');
    Route::post('/', 'App\Http\Controllers\MessageController@create');
    Route::get('/{message_id}', 'App\Http\Controllers\MessageController@detail');
    Route::put('/{message_id}', 'App\Http\Controllers\MessageController@update');
    Route::delete('/{message_id}', 'App\Http\Controllers\MessageController@delete');
});
