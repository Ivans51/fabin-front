<?php

namespace App\Http\Controllers;

use App\Repositories\ProveedorRepo;
use Illuminate\Http\Request;

class ProveedorController extends Controller {
	protected $repo;

	/**
	 * ProveedorController constructor.
	 *
	 * @param $repo
	 */
	public function __construct( ProveedorRepo $repo ) {
		$this->repo = $repo;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$res      = $this->repo->indexProveedor();
		$infoView = $this->repo->setInfoView( 'cms.proveedor.detalles.index', '', 'Error' );

		return $this->repo->getView( $res, $infoView, $res->Data );
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
		$arr      = [
			'Nombre_proveedor' => $request->input( 'nombre' ),
			'Empresa'          => $request->input( 'empresa' ),
			'direccion'        => $request->input( 'direccion' ),
			'email'            => $request->input( 'email' ),
			'telefono'         => $request->input( 'telefono' ),
		];
		$res      = $this->repo->create( $arr );
		$infoView = $this->repo->setInfoView( 'cms.proveedor.detalles.index', 'Proveedor Creado', 'Error' );

		return $this->repo->getView( $res, $infoView, $this->repo->indexProveedor()->Data );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {


		return view( 'cms.clientes.detalles.show', compact( 'product' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$res      = $this->repo->showEdit( $id );
		$infoView = $this->repo->setInfoView( 'cms.proveedor.detalles.edit', '', 'Error' );

		return $this->repo->getView( $res, $infoView, $res->Data );
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
		$infoView = $this->repo->setInfoView( 'cms.proveedor.detalles.index', 'Proveedor Creado', 'Error' );

		return $this->repo->getView( $res, $infoView, $this->repo->indexProveedor()->Data );
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
		$infoView = $this->repo->setInfoView( 'cms.proveedor.detalles.index', 'Proveedor Eliminado', 'Error' );

		return $this->repo->getView( $res, $infoView, $this->repo->indexProveedor()->Data );
	}
}
