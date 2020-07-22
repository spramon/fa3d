<?php

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

Route::get('/','HomeController@index');
Route::get('/home','HomeController@home');
Route::get('/logout','HomeController@logout');
Route::get('/contacto', function (){
  return view('contacto');
});
Route::get('/productos', 'productosController@show');
Route::get('/productos/new', 'productosController@new')->middleware(['auth', 'isAdmin']);;
Route::get('/productos/edit', 'productosController@edit')->middleware(['auth', 'isAdmin']);;
Route::get('/productos/categorias/{id}', 'productosController@categoriaProducto');
Route::delete('/productos/edit/categorias/{id}', 'productosController@editarCategoria');
Route::get('/productos/edit/destacado/{id}', 'productosController@destacado');
Route::post('/productos/edit/imagen/{id}', 'productosController@imagen');
Route::post('/productos/edit/nombre/{id}', 'productosController@nombre');
Route::post('/productos/edit/descripcion/{id}', 'productosController@descripcion');
Route::post('/productos/edit/agregarDescripcion/{id}', 'productosController@agregarDescripcion');
Route::delete('/productos/delete/descripcion/{id}', 'productosController@eliminarDescripcion');
Route::post('/productos/edit/precio/{id}', 'productosController@precio');
Route::delete('/productos/delete/{id}', 'productosController@delete');
Route::post('/productos/new', 'productosController@add');
Route::get('/productos/{id}', 'productosController@categoria');
Route::get('/productos/buscar/{id}', 'busquedaController@buscador');

Route::get('/personalizados', function (){
  return view('personalizados');
});
Route::get('/porhora', function (){
  return view('porhora');
});
Route::get('/comprar', function (){
  return view('comprar');
});
Route::get('/servicios', function (){
  return view('servicios');
});
Route::post('/contacto', 'contactoController@create');
Route::get('/clientes', function (){
  return view('clientes');
});
Auth::routes();
