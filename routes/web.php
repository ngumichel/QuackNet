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

Route::get('/', function () {
    return view('home');
});

Route::get('ducks/password', 'Auth\ChangePasswordController@showChangeForm')->name('ducks.password');
Route::get('ducks/change', 'Auth\ChangePasswordController@passwordChange')->name('ducks.change');
Route::resource('quacks', 'QuackController')->only([
    'index', 'show',
]);

Route::get('ducks/profile', 'DuckController@profile')->name('ducks.profile');
Route::get('ducks/profile/edit', 'DuckController@edit')->name('ducks.predit');
Route::put('ducks/profile/update', 'DuckController@update')->name('ducks.prupdate');

Route::resource('ducks', 'DuckController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
