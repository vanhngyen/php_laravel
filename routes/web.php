<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', 'AbcController@index');
Route::get('/login','LoginController@loginRouting');
Route::get('/register','RegisterController@registerRouting');
Route::get('/forgotPwd', 'ForgotPwdController@ForgotPwd');
Route::get('/list-category', 'AbcController@listcategory');
Route::get('/new-category', 'AbcController@newcategory');
Route::post('/save-category','AbcController@savecategory');
