<?php

/**
 *  TOPページ
 */
Route::get('/', 'DashbordController@index');

Route::get('login', 'Auth\LoginController@index')->name('admin.login');
Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
Route::post('login', 'Auth\LoginController@login')->name('admin.login');

Route::get('users/data', 'UserController@dataIndex')->name('admin.users.data');
Route::resource('users', 'UserController', ["only" => ["index", "show", "destroy"]]);
Route::resource('gears', 'GearController');
Route::resource('accounts', 'AccountController');
