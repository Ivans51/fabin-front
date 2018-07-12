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
Route::get('/home', 'HomeController@index')->name('home');
Route::get( '/index', 'IndexController@show' )->name( 'index' );

Route::get( 'usuarios/history', 'UsuariosController@history' )->name('usuarios_history');
Route::get( 'usuarios/todos', 'UsuariosController@all' )->name('usuarios_todos');

Route::get( 'pedidos/status', 'PedidosController@status' )->name('pedidos_status');

Route::get( 'login', '@status' )->name('pedidos_status');

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

Route::resource( 'pedidos', 'PedidosController' );