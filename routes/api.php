<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('venta/{fecha_inicio}/{fecha_fin}', [
    'as' => 'venta_fecha',
    'uses' => 'VentaController@buscarPorFecha',
]);
Route::get('producto/filtro/{categoria_id}', [
    'as' => 'producto_filtro',
    'uses' => 'ProductoController@obtenerProductos',
]);
Route::resource('sub_categoria','SubCategoriaController');
// Route::get('sub_categoria/{id}','SubCategoriaController@show');
Route::resource('categoria','CategoriaController');
Route::resource('producto','ProductoController');
Route::resource('venta','VentaController');
// Route::resource('compra','CompraController');
Route::get('compra','CompraController@index');
Route::resource('cliente','ClienteController');
