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
Route::get('compra/{fecha_inicio}/{fecha_fin}', [
    'as' => 'compra_fecha',
    'uses' => 'compraController@buscarPorFecha',
]);
Route::get('producto/filtro/{categoria_id}', [
    'as' => 'producto_filtro',
    'uses' => 'ProductoController@obtenerProductos',
]);
Route::get('producto/show/{producto_id}', [
    'as' => 'producto_show',
    'uses' => 'ProductoController@getProducto',
]);
Route::get('insumo', [
    'as' => 'insumo',
    'uses' => 'ProductoController@obtenerInsumos',
]);
Route::get('insumos', [
    'as' => 'insumo_all',
    'uses' => 'ProductoController@obtenerInsumosAll',
]);
Route::post('insumo', [
    'as' => 'insumo.store',
    'uses' => 'ProductoController@guardarInsumo',
]);
Route::get('sub_categorias/{subcategoria_id}', [
    'as' => 'sub_categorias',
    'uses' => 'SubCategoriaController@getSubCategorias',
]);
Route::resource('sub_categoria','SubCategoriaController');
Route::resource('categoria','CategoriaController');
Route::resource('producto','ProductoController');
Route::resource('venta','VentaController');
Route::resource('compra','CompraController');
Route::resource('cliente','ClienteController');
