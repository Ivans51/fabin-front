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
	return redirect()->route('index');
} );
Route::get( '/index', 'IndexController@show' )->name( 'index' );

Route::get( 'usuarios/history', 'UsuariosController@history' )->name('usuarios_history');
Route::get( 'usuarios/todos', 'UsuariosController@all' )->name('usuarios_todos');

Route::get( 'pedidos/status', 'PedidosController@status' )->name('pedidos_status');

Route::get( 'login', 'UsuarioLoginController@showLogin' )->name('usuario_show_login');
Route::post( 'user/login', 'UsuarioLoginController@login' )->name('usuario_login');
Route::get( 'register', 'UsuarioLoginController@showRegister' )->name('usuario_show_register');
Route::post( 'user/register', 'UsuarioLoginController@register' )->name('usuario_register');
Route::get( 'reset', 'UsuarioLoginController@showReset' )->name('usuario_show_reset');
Route::put( 'user/reset', 'UsuarioLoginController@reset' )->name('usuario_reset');

Route::resource( 'producto', 'ProductoController' );
Route::resource( 'categoria', 'CategoriaController' );
Route::resource( 'medidas', 'MedidasController' );

Route::resource( 'iva', 'IvaController' );
Route::resource( 'metodos', 'MetodosController' );
Route::resource( 'preferencias', 'PreferenciaController' );

Route::resource( 'ventas', 'VentasController' );
Route::resource( 'clientes', 'ClientesController' );
Route::resource( 'proveedor', 'ProveedorController' );
Route::resource( 'usuarios', 'UsuariosController' );

Route::resource( 'auditoria', 'AuditoriaController' );
Route::resource( 'respaldo', 'RespaldoController' );
Route::resource( 'manual', 'ManualController' );

Route::resource( 'pedidos', 'PedidosController' );