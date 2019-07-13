<?php


Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('products/{id}','ProductController@show');//mostrar registro de producto

Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');

Route::post('/order','CartController@update');


Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/products','ProductController@index'); //listado
	Route::get('/products/create','ProductController@create'); //formulario
	Route::post('/products','ProductController@store'); //registrar
	Route::get('/products/{id}/edit/','ProductController@edit'); //formulario edicion
	Route::post('/products/{id}','ProductController@update'); //actualizar
	Route::delete('/products/{id}','ProductController@destroy');//borrar

	Route::get('/products/{id}/images','ImageController@index'); //listado y formulario
	Route::post('/products/{id}/images','ImageController@store'); //guardar imageners
	Route::delete('/products/{id}/images','ImageController@destroy'); //borrar imagenes
	Route::get('/products/{id}/images/select/{image}','ImageController@select'); //destacar imagenes

	Route::get('/categories','CategoryController@index'); //listado
	Route::get('/categories/create','CategoryController@create'); //formulario
	Route::post('/categories','CategoryController@store'); //registrar
	Route::get('/categories/{id}/edit/','CategoryController@edit'); //formulario edicion
	Route::post('/categories/{id}','CategoryController@update'); //actualizar
	Route::delete('/categories/{id}','CategoryController@destroy');//borrar
});


//parte del cliente
