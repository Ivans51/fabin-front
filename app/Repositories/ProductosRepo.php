<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/15/2018
 * Time: 7:48
 */

namespace App\Repositories;

use App\Repositories\Core\GuzzleHTTPRequest;

class ProductosRepo extends GuzzleHTTPRequest
{

    public function indexProducto() {
        return $this->doRequestHeader( '/api/articulos/all', 'GET' );
    }

	public function indexCategoria() {
		return $this->doRequestHeader( '/api/categorias/getall', 'GET' );
	}

	public function indexProveedor() {
		return $this->doRequestHeader( '/api/proveedores/all', 'GET' );
	}

	public function indexMedidas() {
		return $this->doRequestHeader( '/api/unidadmedida/getall', 'GET' );
	}

	public function indexStock() {
		return $this->doRequestHeader( '/api/proveedores/all', 'GET' );
	}

	public function indexIVA() {
		return $this->doRequestHeader( '/api/iva/getall', 'GET' );
	}

	public function create( $arr, $id ) {
		return $this->doRequestBodyHeader( $arr, '/api/articulos/newarticleproveedor/' . $id, 'POST' );
    }

	public function edit( $arr, $id ) {
        return $this->doRequestBodyHeader( $arr, '/api/proveedores/id/' . $id . '/edi', 'PUT' );
    }

    public function delete( $id ) {
        return $this->doRequestHeader( '/api/proveedores/id/' . $id . '/delete', 'DELETE' );
    }

    public function showEdit( $id ) {
        return $this->doRequestHeader( '/api/articulos/id/' . $id , 'GET' );
    }
}