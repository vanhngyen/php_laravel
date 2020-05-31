<?php
Route::get("/","AbcController@dashboard");
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
Route::get("/list-product","AbcController@listProduct")->middleware("admin");
Route::get("/new-product","AbcController@newProduct");
Route::post("/save-product","AbcController@saveProduct");
Route::get("/edit-product/{id}","AbcController@editProduct");
Route::put("/update-product/{id}","AbcController@updateProduct");
Route::delete("/delete-product/{id}",'AbcController@deleteProduct');
