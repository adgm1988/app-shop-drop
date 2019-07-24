<?php


Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('search','SearchController@show');//mostrar registro de producto
Route::get('products/json','SearchController@data');//mostrar registro de producto

Route::get('products/{id}','ProductController@show');//mostrar registro de producto
Route::get('categories/{category}','CategoryController@show');//mostrar registro de producto

Route::get('search','SearchController@show');//mostrar registro de producto
Route::get('products/json','SearchController@data');//mostrar registro de producto


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
	Route::get('/categories/{category}/edit/','CategoryController@edit'); //formulario edicion
	//Route::get('/categories/{id}/edit/','CategoryController@edit'); //formulario edicion aqui arriba le pusimos category para pasar directo al valor al controlador en la cateogia, no es necesario, es para ahorrarte el find, solo como ejemplo.
	Route::post('/categories/{category}','CategoryController@update'); //actualizar
	//Route::post('/categories/{id}','CategoryController@update'); //actualizar es la manera normal, estamos probando pasara directo el nombre del modelo.
	Route::delete('/categories/{category}','CategoryController@destroy');//borrar
});


//parte del cliente
