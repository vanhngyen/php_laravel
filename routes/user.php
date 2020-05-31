<?php
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'AbcController@index');
Route::get('/forgotPwd', 'ForgotPwdController@ForgotPwd');
