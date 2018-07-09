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

// require '../vendor/autoload.php';
Route::get( '/', function () {
	return redirect()->route('home');
} );
Route::get( '/index', 'IndexController@show' )->name( 'index' );

Route::resource( 'producto', 'ProductoController' );
Route::resource( 'categoria', 'CategoriaController' );
Route::resource( 'medidas', 'MedidasController' );

Route::resource( 'iva', 'IvaController' );
Route::resource( 'metodos', 'MetodosController' );
Route::resource( 'preferencias', 'PreferenciaController' );

Route::resource( 'ventas', 'VentasController' );
Route::resource( 'clientes', 'ClientesController' );
Route::resource( 'usuarios', 'UsuariosController' );

Route::resource( 'auditoria', 'AuditoriaController' );
Route::resource( 'respaldo', 'RespaldoController' );
Route::resource( 'manual', 'ManualController' );
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
