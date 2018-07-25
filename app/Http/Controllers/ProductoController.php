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
		$imageData = $request->file( 'imagen' ); // your base64 encoded
		$file_path = $imageData->getPathName();
		$type      = pathinfo( $file_path, PATHINFO_EXTENSION );
		$data      = file_get_contents( $file_path );
		$image     = 'data:image/' . $type . ';base64,' . base64_encode( $data );

		$nombre       = $request->input( 'nombre' );
		$id_categoria = $request->input( 'id_categoria' );
		$id_unidad    = $request->input( 'id_unidad_medida' );
		$cantidad     = $request->input( 'cantidad' );
		$id_impuesto  = $request->input( 'id_impiuesto' );
		$id_proveedor = $request->input( 'id_proveedor' );

		if ( $nombre != "" and $id_categoria != 0
		                       and $id_unidad != 0 and $cantidad != 0
		                                               and $id_impuesto != 0 and $id_proveedor != 0 ) {
			$arr      = [
				'nombre'           => $nombre,
				'imagen'           => $image,
				'Id_categoria'     => $id_categoria,
				'id_unidad_medida' => $id_unidad,
				'cantidad'         => $cantidad,
				'id_impiuesto'     => $id_impuesto,
			];
			$res      = $this->repo->create( $arr, $id_proveedor );
			$infoView = $this->repo->setInfoView( 'cms.catalogo.producto.index', 'Producto Creado', 'Error' );

			$code = $this->repo->getCode( $res, $infoView, "Duplicate" );

			switch ( $code ) {
				case 200:
					return $this->show( $res->Data->insertId );
				case 501:
					return abort( 404, 'El nombre del artículo duplicado' );
				default:
					return abort( 404, 'Error registrando' );
			}
		} else {
			session()->flash( 'info', 'Faltan datos por rellenar' );

			return $this->index();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
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
		/*$stock      = $this->repo->indexStock();*/
		$data = [
			'data'        => $res->Data,
			'iva'         => $iva->Data,
			'categories'  => $categories->Data,
			'unidades'    => $medidas->Data,
			'proveedores' => $proveedor->Data,
			/*'stock'      => $stock->Data,*/
		];
		if ( $this->repo->isSuccessful( $res ) and $this->repo->isSuccessful( $iva )
		                                           and $this->repo->isSuccessful( $categories )
		                                               and $this->repo->isSuccessful( $medidas )
		                                                   and $this->repo->isSuccessful( $proveedor ) ) {
			return $this->repo->getViewInfoMultiple( 'cms.catalogo.producto.index', '', $data );
		} else {
			return abort( 404, 'Error cargando datos' );
		}
	}

	/**
	 * @param $res
	 *
	 * @return array
	 */
	public function getIva( $res ): array {
		$nivel      = $res->Data;
		$nivelValue = array( 'Seleccionar' );
		for ( $i = 0; $i < count( $nivel ); $i ++ ) {
			$nivelValue[] = $nivel[ $i ]->nombre;
		}

		return $nivelValue;
	}

	/**
	 * @param $res
	 *
	 * @return array
	 */
	public function getCategories( $res ): array {
		$nivel      = $res->Data;
		$nivelValue = array( 'Seleccionar' );
		for ( $i = 0; $i < count( $nivel ); $i ++ ) {
			$nivelValue[] = $nivel[ $i ]->nombre;
		}

		return $nivelValue;
	}

	/**
	 * @param $res
	 *
	 * @return array
	 */
	public function getUnidades( $res ): array {
		$nivel      = $res->Data;
		$nivelValue = array( 'Seleccionar' );
		for ( $i = 0; $i < count( $nivel ); $i ++ ) {
			$nivelValue[] = $nivel[ $i ]->descripcion_larga;
		}

		return $nivelValue;
	}

	/**
	 * @param $res
	 *
	 * @return array
	 */
	public function getProveedores( $res ): array {
		$nivel      = $res->Data;
		$nivelValue = array( 'Seleccionar' );
		for ( $i = 0; $i < count( $nivel ); $i ++ ) {
			$nivelValue[] = $nivel[ $i ]->Nombre_proveedor;
		}

		return $nivelValue;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		$res = $this->repo->showEdit( $id );
		$iva        = $this->repo->indexIVA();
		$categories = $this->repo->indexCategoria();
		$medidas    = $this->repo->indexMedidas();
		$proveedor  = $this->repo->indexProveedor();
		/*$stock      = $this->repo->indexStock();*/
		$data = [
			'data'        => $res->Data,
			'iva'         => $iva->Data,
			'categories'  => $categories->Data,
			'unidades'    => $medidas->Data,
			'proveedores' => $proveedor->Data,
			/*'stock'      => $stock->Data,*/
		];
		if ( $this->repo->isSuccessful( $res ) and $this->repo->isSuccessful( $iva )
		                                           and $this->repo->isSuccessful( $categories )
		                                               and $this->repo->isSuccessful( $medidas )
		                                                   and $this->repo->isSuccessful( $proveedor ) ) {
			return $this->repo->getViewInfoMultiple( 'cms.catalogo.producto.edit', '', $data );
		} else {
			return abort( 404, 'Error cargando datos' );
		}
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
