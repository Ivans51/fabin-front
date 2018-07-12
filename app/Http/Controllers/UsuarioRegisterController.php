<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class UsuarioRegisterController extends Controller {
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

		return view( 'cms.pago.iva.index', compact( 'products' ) );
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
		$client = new Client( [
			'base_uri' => 'https://jsonplaceholder.typicode.com',
			'timeout'  => 2.0,
		] );
		try {
			$response = $client->request( 'GET', '/posts/' . $id );
			$product = json_decode( $response->getBody()->getContents() );
		} catch ( GuzzleException $e ) {
			error_log( $e->getMessage() );
		}
		return view( 'cms.pago.iva.show', compact( 'product' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$client = new Client( [
			'base_uri' => 'https://jsonplaceholder.typicode.com',
			'timeout'  => 2.0,
		] );
		try {
			$response = $client->request( 'GET', '/posts/' . $id );
			$product = json_decode( $response->getBody()->getContents() );
		} catch ( GuzzleException $e ) {
			error_log( $e->getMessage() );
		}
		return view( 'cms.pago.iva.edit', compact( 'product' ) );
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
