<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class UsuarioLoginController extends Controller {
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

	public function showLogin() {
		return view( 'cms.login' );
	}

	public function showRegister() {
		$client = new Client( [
			'base_uri' => 'http://165.227.96.113:5010',
			'timeout'  => 2.0,
		] );
		try {
			$response = $client->request( 'GET', '/api/users/levelusers' );
			$nivel    = $response->getStatusCode() == 200 ? json_decode( $response->getBody()->getContents() ) : '';

			return view( 'cms.register', compact( $nivel ) );
		} catch ( GuzzleException $e ) {
			error_log( $e->getMessage() );
		}
	}

	public function register() {

	}

	public function login( Request $request ) {
		$client = new Client(['base_uri' => 'http://165.227.96.113:5010']);
		try {
			$response     = $client->request( 'POST', '/api/users/login', [
				'form_params' => [
					'email'       => $request->input( 'email' ),
					'contrasehna' => $request->input( 'contrasehna' )
				]
			] );
			$responseJSON = json_decode( $response->getBody(), true );

			return view( 'cms.register', compact( $response ) );
		} catch ( GuzzleException $e ) {
		}
		// session('user_start');
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
			$product  = json_decode( $response->getBody()->getContents() );
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
			$product  = json_decode( $response->getBody()->getContents() );
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
