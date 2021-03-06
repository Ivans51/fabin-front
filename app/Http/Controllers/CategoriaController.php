<?php

namespace App\Http\Controllers;

use App\Repositories\CategoriaRepo;
use Illuminate\Http\Request;

class CategoriaController extends Controller {
	protected $repo;

	/**
	 * CategoriaController constructor.
	 *
	 * @param $repo
	 */
	public function __construct( CategoriaRepo $repo ) {
		$this->repo = $repo;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$res      = $this->repo->indexCategoria();
		$infoView = $this->repo->setInfoView( 'cms.catalogo.categoria.index', '', 'Error' );

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
			'descripcion_larga'          => $request->input( 'descripcion_indexlarga' ),
		];
		$res      = $this->repo->create( $arr );
		$infoView = $this->repo->setInfoView( 'cms.catalogo.categoria.index', 'Categoría Creada', 'Error' );
        return $this->repo->getCode($res, $infoView) == 200 ? $this->index() : abort(404, 'Error creando categoría');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {

		return view( 'cms.catalogo.categoria.show', compact( 'product' ) );
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
		$infoView = $this->repo->setInfoView( 'cms.catalogo.categoria.edit', '', 'Error' );

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
			'nombre' => $request->input( 'nombre' ),
			'descripcion_larga'          => $request->input( 'descripcion_larga' ),
		];
		$res      = $this->repo->edit( $arr, $id );
		$infoView = $this->repo->setInfoView( 'cms.catalogo.categoria.edit', 'Categoría editada', 'Error' );
        return $this->repo->getCode($res, $infoView) == 200 ? $this->edit($id) : abort(404, 'Error editando categoría');
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
		$infoView = $this->repo->setInfoView( 'cms.catalogo.categoria.edit', 'Categoría Eliminada', 'Error' );

        return $this->repo->getCode($res, $infoView) == 200 ? $this->index() : abort(404, 'Error eliminando categoría');
	}
}
