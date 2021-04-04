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

Route::get('/home', 'TodoListController@index')->name('home');

Route::get('/todolist/create', 'TodolistController@create')->name('todolist_create');
Route::post('/todolist/add', 'TodolistController@add')->name('todolist_add');
Route::get('/todolist/delete', 'TodolistController@delete')->name('todolist_delete');
Route::get('/todolist/update/{id}', 'TodolistController@edit');
Route::post('/todolist/update', 'TodolistController@update')->name('todolist_update');

Route::get('/items', 'ItemController@index')->name('items');

Route::get('/items/create', 'ItemController@create')->name('item_create');
Route::post('/items/add', 'ItemController@add')->name('item_add');
Route::get('/items/delete', 'ItemController@delete')->name('item_delete');
Route::get('/items/update/{id}', 'ItemController@edit');
Route::post('/items/update', 'ItemController@update')->name('item_update');
