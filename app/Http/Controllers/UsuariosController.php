<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class UsuariosController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$client = new Client( [
			'base_uri' => 'https://jsonplaceholder.typicode.com',
			'timeout'  => 2.0,
		] );
		try {
			$response = $client->request( 'GET', '/posts' );
			$products = json_decode( $response->getBody()->getContents() );
		} catch ( GuzzleException $e ) {
			error_log( $e->getMessage() );
		}

		return view( 'cms.usuarios.detalles.index', compact( 'products' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$product = '';

		return view( 'admin.posts.create', compact( 'product' ) );
	}

	public function history() {
		$status = 0;
		$client = new Client( [
			'base_uri' => 'https://jsonplaceholder.typicode.com',
			'timeout'  => 2.0,
		] );
		try {
			$response = $client->request( 'GET', '/posts' );
			$products = json_decode( $response->getBody()->getContents() );
			$status = $response->getStatusCode();
		} catch ( GuzzleException $e ) {
			error_log( $e->getMessage() );
		}

		return $status == 200 ? view( 'cms.usuarios.detalles.history', compact( 'products' ) ) : abort( 404 );
	}

	public function all() {
		$status = 0;
		$client = new Client( [
			'base_uri' => 'https://jsonplaceholder.typicode.com',
			'timeout'  => 2.0,
		] );
		try {
			$response = $client->request( 'GET', '/posts' );
			$products = json_decode( $response->getBody()->getContents() );
			$status = $response->getStatusCode();
		} catch ( GuzzleException $e ) {
			error_log( $e->getMessage() );
		}

		return $status == 200 ? view( 'cms.usuarios.detalles.todos', compact( 'products' ) ) : abort( 404 );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$post = '';

		return redirect()->route( 'posts.edit', $post->id )->with( 'info', 'Entrada creada con éxito' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		$product = '';
		return view( 'cms.usuarios.detalles.show', compact( 'product' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$product = '';
		return view( 'cms.usuarios.detalles.edit', compact( 'product' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		$post = $id;

		return redirect()->route( 'posts.edit', $post->id )->with( 'info', 'Entrada actualizada con éxito' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		return back()->with( 'info', 'Eliminado correctamente' );
	}
}
