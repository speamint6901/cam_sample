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
Route::post('brands/import', 'BrandController@import')->name('admin.brands.import');
Route::post('brand_groups/import', 'BrandController@importGroups')->name('admin.brand_groups.import');
Route::resource('brands', 'BrandController');

Route::get('genres/data', 'GenreController@dataIndex')->name('admin.genres.data');
Route::post('genres/import', 'GenreController@import')->name('admin.genres.import');
Route::resource('genres', 'GenreController');

Route::get('categories/data', 'CategoryController@dataIndex')->name('admin.categories.data');
Route::post('categories/import', 'CategoryController@import')->name('admin.categories.import');
Route::resource('categories', 'CategoryController');

Route::get('big_categories/data', 'BigCategoryController@dataIndex')->name('admin.big_categories.data');
Route::post('big_categories/import', 'BigCategoryController@import')->name('admin.big_categories.import');
Route::resource('big_categories', 'BigCategoryController');

Route::resource('accounts', 'AccountController');
