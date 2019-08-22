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


Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('home', 'HomeController@index')->name('home');

Route::get('admin', 'HomeController@admin')->name('admin');

Route::get('ducks/password', 'Auth\ChangePasswordController@showChangeForm')->name('ducks.password');
Route::put('ducks/change', 'Auth\ChangePasswordController@passwordChange')->name('ducks.change');

Route::get('ducks/profile', 'DuckController@profile')->name('ducks.profile');
Route::get('ducks/profile/edit', 'DuckController@edit')->name('ducks.edit');
Route::put('ducks/profile/edit', 'DuckController@update')->name('ducks.update');

Route::resource('ducks', 'DuckController')->only(['index', 'show']);

Route::resource('quacks', 'QuackController')->except('create');

Route::get('search', 'SearchController@index')->name('search.index');

Auth::routes();


