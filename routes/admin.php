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
Route::get('gears/data', 'GearController@dataIndex')->name('admin.gears.data');
Route::resource('gears', 'GearController');
Route::get('brands/data', 'BrandController@dataIndex')->name('admin.brands.data');
Route::resource('brands', 'BrandController');
Route::get('genres/data', 'GenreController@dataIndex')->name('admin.genres.data');
Route::resource('genres', 'GenreController');
Route::get('categories/data', 'CategoryController@dataIndex')->name('admin.categories.data');
Route::resource('categories', 'CategoryController');
Route::get('big_categories/data', 'BigCategoryController@dataIndex')->name('admin.big_categories.data');
Route::resource('big_categories', 'BigCategoryController');
Route::resource('accounts', 'AccountController');
