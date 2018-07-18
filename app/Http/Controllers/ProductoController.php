<?php

namespace App\Http\Controllers;

use App\Repositories\ProductosRepo;
use Illuminate\Http\Request;

class ProductoController extends Controller {

	protected $repo;

	/**
	 * ProductoController constructor.
	 *
	 * @param $repo
	 */
	public function __construct( ProductosRepo $repo ) {
		$this->repo = $repo;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$res        = $this->repo->indexProducto();
		$iva        = $this->repo->indexIVA();
		$categories = $this->repo->indexCategoria();
		$medidas    = $this->repo->indexMedidas();
		$proveedor  = $this->repo->indexProveedor();
		$stock      = $this->repo->indexStock();
		$data       = [
			'data'       => $res->Data,
			'iva'        => $iva->Data,
			'categories' => $categories->Data,
			'unidades'   => $medidas->Data,
			'proveedor'  => $proveedor->Data,
			'stock'      => $stock->Data,
		];
		$infoView   = $this->repo->setInfoView( 'cms.catalogo.producto.index', '', 'Error' );

		return $this->repo->getView( $res, $infoView, $data, true );
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

		return view( 'cms.catalogo.producto.show', compact( 'product' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {

		return view( 'cms.catalogo.producto.edit', compact( 'product' ) );
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
