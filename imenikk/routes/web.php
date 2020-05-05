<?php


Route::get('/', function () {
    return view('welcome');
});
Route::resource('imenikk', 'ImenikController');

Route::get('/search', 'ImenikController@search');
Auth::routes();

Route::get('/profile', 'HomeController@index')->name('profile');
Route::patch('/profile', 'HomeController@update')->name('update');
