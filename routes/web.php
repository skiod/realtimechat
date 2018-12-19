<?php

Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('/send','HomeController@sendMsg');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
