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
Route::any('password/reset', 'HomeController@reset');
Route::any('password/reset/send', 'HomeController@send');
Route::any('password/reset/input', 'HomeController@input');
Route::any('password/reset/complete', 'HomeController@complete');
Route::any('{all}', 'HomeController@index')->where(['all' => '.*']);
/*
Route::any('{all}', function () {
    //return view('app');
    Route::get('/', 'HomeController@index');
})->where(['all' => '.*']);
*/
