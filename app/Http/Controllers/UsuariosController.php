<?php

namespace App\Http\Controllers;

use App\Repositories\UsuariosRepo;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UsuariosController extends Controller {

	protected $repo;

	/**
	 * UsuariosController constructor.
	 *
	 * @param $repo
	 */
	public function __construct( UsuariosRepo $repo ) {
		$this->repo = $repo;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$client = new Client( [ 'base_uri' => 'http://165.227.96.113:5010' ] );
		/*$response = $client->request( 'GET', '/api/users/levelusers' );
		$nivel    = $response->getStatusCode() == 200 ? json_decode( $response->getBody()->getContents() ) : '';*/
		$response = 'Ivans';
		$nivel    = 'Pedro';

		return view( 'cms.register', compact( 'nivel', 'response' ) );
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
	}

	public function all() {
		$res      = $this->repo->allUsers();
		$infoView = $this->repo->setInfoView( 'cms.usuarios.detalles.todos', '', 'Error' );

		return $this->repo->getView( $res, $infoView );
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
		$arr      = [
			'Nombre_proveedor' => $request->input( 'nombre' ),
			'Empresa'          => $request->input( 'empresa' ),
			'direccion'        => $request->input( 'direccion' ),
			'email'            => $request->input( 'email' ),
			'telefono'         => $request->input( 'telefono' ),
		];
		$res      = $this->repo->edit( $arr, $id );
		$infoView = $this->repo->setInfoView( 'cms.proveedor.detalles.index', 'Usuario Creado', 'Error' );

        return $this->repo->getCode($res, $infoView) == 200 ? $this->edit($id) : abort(404, 'Error creando usuario');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		$res      = $this->repo->delete( $id );
		$infoView = $this->repo->setInfoView( 'cms.usuarios.detalles.todos', 'Usuario Eliminado', 'Error' );

        return $this->repo->getCode($res, $infoView) == 200 ? $this->index() : abort(404, 'Error eliminando usuario');
	}
}
