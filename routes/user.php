<?php
Route::get('/', "AbcController@index");
Route::get('/home', 'HomeController@index')->name('home');

Route::get("/category/{category:slug}","HomeController@category");
