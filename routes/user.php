<?php
Route::get('/', "AbcController@index");
Route::get('/home', 'HomeController@index')->name('home');

Route::get("/category/{category:slug}","HomeController@category");
Route::get("/category","HomeController@category");
Route::get("/product/{product:slug}","HomeController@product");
Route::get("/product","HomeController@product");
Route::post("/cart/add/{product}","HomeController@addToCart");

Route::get("/shopping-cart","HomeController@shoppingCart");
Route::get("/checkout","HomeController@checkout")->middleware("auth");
Route::post("checkout","HomeController@plateOrder")->middleware("auth");
