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

Route::get('/jurries', 'JurryController@getAll');
Route::get('/jurries/{id}', 'JurryController@getWithLimit');
Route::get('/expert', 'JurryController@lentFunction');
Route::post('/create', 'JurryController@store');
Route::delete('/delete/{id}','JurryController@destroy');
