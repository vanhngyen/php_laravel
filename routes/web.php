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
Route::get("/edit-category/{id}","AbcController@editCategory");
Route::put("/update-category/{id}","AbcController@updateCategory");
Route::delete("/delete-category/{id}","AbcController@deleteCategory");


Route::get('/list-brand','AbcController@listbrand');
Route::get('/new-brand', 'AbcController@newbrand');
Route::post('/save-brand','AbcController@savebrand');
Route::get("/edit-brand/{id}","AbcController@editBrand");
Route::put("/update-brand/{id}","AbcController@updateBrand");
Route::put("/delete-brand",'AbcController@deleteBrand');


