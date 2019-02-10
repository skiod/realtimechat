<?php

Route::get('/','HomeController@cccv');

Route::post('/send','HomeController@sendMsg');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cc','HomeController@cccv');


Auth::routes();
