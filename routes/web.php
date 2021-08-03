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
Route::get('/uploadImage', function () {
    return view('uploadImage');
});


// POST method
Route::post('/Auth', 'AuthController@login');
Route::post('/updateAgentStatus', 'AuthController@updateAgentStatus');
Route::post('/uploadFile', 'AuthController@uploadFile');

// GET method
Route::get('/dashboard', 'AuthController@dashboard');
Route::get('/logout', 'AuthController@logout');
Route::get('/agent_list', 'AuthController@agent_list');
Route::get('/getAgentData', 'AuthController@getAgentData');
