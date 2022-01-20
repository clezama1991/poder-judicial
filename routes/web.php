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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['admin'])->group(function () {

    Route::resource('productos', '\App\Http\Controllers\ProductosController');
    Route::resource('facturas', '\App\Http\Controllers\FacturasController');
    Route::post('generar_facturas_pendientes', '\App\Http\Controllers\FacturasController@generar_facturas_pendientes');

});

Route::get('compras', '\App\Http\Controllers\ComprasController@index');
Route::post('guardar_compra', '\App\Http\Controllers\ComprasController@guardar_compra');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
