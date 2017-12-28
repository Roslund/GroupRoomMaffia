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

Route::get('/', function (Request $request) {
    return redirect('/sessions');
});
Route::get('/sessions', 'KronoxSessionController@index');
Route::get('/sessions/delete/{session}', 'KronoxSessionController@delete');
Route::post('/sessions', 'KronoxSessionController@add');
