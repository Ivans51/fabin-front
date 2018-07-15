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
        $client = new Client(['base_uri' => 'http://165.227.96.113:5010']);
        /*$response = $client->request( 'GET', '/api/users/levelusers' );
        $nivel    = $response->getStatusCode() == 200 ? json_decode( $response->getBody()->getContents() ) : '';*/
        $response = 'Ivans';
        $nivel = 'Pedro';
        return view('cms.register', compact('nivel', 'response'));
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


		return $status == 200 ? view( 'cms.usuarios.detalles.history', compact( 'products' ) ) : abort( 404 );
	}

	public function all() {


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
