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

Route::get('/todos/get', 'TodosController@get');
Route::post('/todos/add', 'TodosController@add');
Route::patch('/todos/update/{id}', 'TodosController@update');
Route::delete('/todos/delete/{id}', 'TodosController@delete');

Route::get('/orders/get', 'OrdersController@get');
Route::patch('/orders/set', 'OrdersController@set');
