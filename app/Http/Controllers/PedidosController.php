<?php

namespace App\Http\Controllers;

use App\Repositories\PedidosRepo;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class PedidosController extends Controller {

	protected $repo;

	/**
	 * PedidosController constructor.
	 *
	 * @param $repo
	 */
	public function __construct( PedidosRepo $repo ) {
		$this->repo = $repo;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$res      = $this->repo->indexPedido();
		$infoView = $this->repo->setInfoView( 'cms.pedidos.producto.index', '', 'Error' );

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

	public function status() {
		$product = '';

		return view( 'cms.pedidos.producto.status', compact( 'product' ) );
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
		$infoView = $this->repo->setInfoView( 'cms.pedidos.producto.index', 'Pedido Creado', 'Error' );

		return $this->repo->getView( $res, $infoView, $this->repo->indexPedido()->Data );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {

		return view( 'cms.pedidos.producto.show', compact( 'product' ) );
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
		$infoView = $this->repo->setInfoView( 'cms.pedidos.producto.index', '', 'Error' );

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
		$infoView = $this->repo->setInfoView( 'cms.pedidos.producto.index', 'Pedido editado', 'Error' );

		return $this->repo->getView( $res, $infoView, $this->repo->indexPedido()->Data );
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
		$infoView = $this->repo->setInfoView( 'cms.pedidos.producto.index', 'Pedido Eliminado', 'Error' );

		return $this->repo->getView( $res, $infoView, $this->repo->indexPedido()->Data );
	}
}
