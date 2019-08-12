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

Route::resource('quacks', 'QuackController')->only([
    'index', 'show',
]);

Route::get('ducks/profile', 'DuckController@profile')->name('ducks.profile');
Route::get('ducks/profile/edit', 'DuckController@edit')->name('ducks.predit');
Route::get('ducks/profile/update', 'DuckController@update')->name('ducks.prupdate');
Route::resource('ducks', 'DuckController');

Route::get('ducks/password', function() {
    return view('auth.passwords.reset');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
