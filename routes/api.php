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

Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@showRegisterForm');
Route::post('/register', 'AuthController@register');
Route::get('/register/complete', 'AuthController@showComplete');
Route::get('/register/confirm_mail', 'AuthController@confirmMail')->name('register.confirm.mail');
Route::get('/user/current', 'AuthController@getCurrentUser');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/me', 'AuthController@me');
    Route::get('/logout', 'AuthController@logout');
});
