<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/', 'AbcController@index');
Route::get('/login','LoginController@loginRouting');
Route::get('/register','RegisterController@registerRouting');
Route::get('/forgotPwd', 'ForgotPwdController@ForgotPwd');
//category
Route::get('/list-category', 'AbcController@listcategory');
Route::get('/new-category', 'AbcController@newcategory');
Route::post('/save-category','AbcController@savecategory');
Route::get("/edit-category/{id}","AbcController@editCategory");
Route::put("/update-category/{id}","AbcController@updateCategory");
Route::delete("/delete-category/{id}","AbcController@deleteCategory");

//brand
Route::get('/list-brand','AbcController@listbrand');
Route::get('/new-brand', 'AbcController@newbrand');
Route::post('/save-brand','AbcController@savebrand');
Route::get("/edit-brand/{id}","AbcController@editBrand");
Route::put("/update-brand/{id}","AbcController@updateBrand");
Route::delete("/delete-brand/{id}",'AbcController@deleteBrand');

//product
Route::get("/list-product","AbcController@listProduct");
Route::get("/new-product","AbcController@newProduct");
Route::post("/save-product","AbcController@saveProduct");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
