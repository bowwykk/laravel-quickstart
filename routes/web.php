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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::get('/task/{task}/edit', 'TaskController@edit');
Route::put('/task/{task}', 'TaskController@update');
Route::delete('/task/{task}', 'TaskController@destroy');

// Authentication Routes...
Route::auth();
