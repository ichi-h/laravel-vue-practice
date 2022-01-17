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
    return view('index');
});

// APIs

Route::post('/todos/get', 'TodosController@get');
Route::post('/todos/add', 'TodosController@add');
Route::post('/todos/update/{id}', 'TodosController@update');
Route::post('/todos/delete/{id}', 'TodosController@delete');

Route::post('/orders/get', 'OrdersController@get');
Route::post('/orders/set', 'OrdersController@set');
