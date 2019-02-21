<?php

/**
 *  TOPページ
 */
Route::get('/', 'DashbordController@index');

Route::get('login', 'Auth\LoginController@index')->name('admin.login');
Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
Route::post('login', 'Auth\LoginController@login')->name('admin.login');

Route::resource('users', 'UserController');
Route::resource('gears', 'GearController');
Route::resource('accounts', 'AccountController');
