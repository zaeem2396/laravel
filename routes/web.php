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

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});

Route::post('/Auth', 'AuthController@login');
Route::get('/dashboard', 'AuthController@dashboard');
Route::post('/disableAgent', 'AuthController@disableAgent');
Route::post('/enableAgent', 'AuthController@enableAgent');