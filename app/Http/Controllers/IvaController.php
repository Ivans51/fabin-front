<?php

namespace App\Http\Controllers;

use App\Repositories\IVARepo;
use Illuminate\Http\Request;

class IvaController extends Controller {

	protected $repo;

	/**
	 * IvaController constructor.
	 *
	 * @param $repo
	 */
	public function __construct( IVARepo $repo ) {
		$this->repo = $repo;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$res      = $this->repo->indexIVA();
		$infoView = $this->repo->setInfoView( 'cms.pago.iva.index', '', 'Error' );

		return $this->repo->getView( $res, $infoView );
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
			'nombre' => $request->input( 'nombre' ),
			'porcentaje'          => $request->input( 'porcentaje' ),
		];
		$res      = $this->repo->create( $arr );
		$infoView = $this->repo->setInfoView( 'cms.pago.iva.index', 'IVA Creado', 'Error' );

        return $this->repo->getCode($res, $infoView) == 200 ? $this->index() : abort(404, 'Error creando IVA');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {

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
		$res      = $this->repo->showEdit( $id );
		$infoView = $this->repo->setInfoView( 'cms.pago.iva.index', '', 'Error' );

		return $this->repo->getView( $res, $infoView );
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
			'porcentaje'          => $request->input( 'porcentaje' ),
		];
		$res      = $this->repo->edit( $arr, $id );
		$infoView = $this->repo->setInfoView( 'cms.pago.iva.index', 'IVA editado', 'Error' );

        return $this->repo->getCode($res, $infoView) == 200 ? $this->edit($id) : abort(404, 'Error creando IVA');
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
		$infoView = $this->repo->setInfoView( 'cms.pago.iva.index', 'IVA Eliminado', 'Error' );

        return $this->repo->getCode($res, $infoView) == 200 ? $this->index() : abort(404, 'Error creando IVA');
	}
}
