<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Psr\Http\Message\ResponseInterface;

class UsuarioLoginController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$client = new Client( [
			'base_uri' => 'https://jsonplaceholder.typicode.com'
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
			$response = 'Ivans';

			return view( 'cms.register', compact( 'nivel', 'response' ) );
		} catch ( GuzzleException $e ) {
			error_log( $e->getMessage() );
		}
	}

	public function register() {

	}

	public function login( Request $request ) {
		$client   = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://165.227.96.113:5010/',
			// You can set any number of default request options.
			'timeout'  => 2.0,
		]);
		/*$payload  = file_get_contents( '/my-data.xml' );*/
		$email    = $request->input( 'email' );
		$clave    = $request->input( 'contrasehna' );
		try {
			$promise = $client->requestAsync( 'POST', 'api/users/login', [
				'form_params' => [
					'email'       => 'robertelias64@gmail.com',
					'contrasehna' => 'motorola'
				]
			] );
			$promise->then(
				function (ResponseInterface $res) {
					echo $res;
					echo 'IVans';
					/*echo $res->getStatusCode() . "\n";*/
				},
				function (RequestException $e) {
					echo $e;
					echo 'IVans';
					/*echo $e->getMessage() . "\n";
					echo $e->getRequest()->getMethod();*/
				}
			);
			/*var_dump($promise);*/
		} catch ( GuzzleException $e ) {
		}
		/*$promise = $client->postAsync( '/api/users/login', [
			RequestOptions::JSON => [
				'email'       => $email,
				'contrasehna' => $clave
			]
		] );
		$promise->then(
			function (ResponseInterface $res) {
				echo $res->getStatusCode() . "\n";
			},
			function (RequestException $e) {
				echo $e->getMessage() . "\n";
				echo $e->getRequest()->getMethod();
			}
		);*/
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
