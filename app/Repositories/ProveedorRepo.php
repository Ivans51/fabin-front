<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/15/2018
 * Time: 7:48
 */

namespace App\Repositories;

class ProveedorRepo extends GuzzleHTTPRequest {

	public function indexProveedor() {
		return $this->doRequestHeader( '/api/proveedores/all', 'GET' );
	}

	public function create( $arr ) {
		return $this->doRequestBodyHeader( $arr, '/api/proveedores/newproveedor', 'POST' );
	}

	public function delete( $id ) {
		return $this->doRequestHeader( '/api/proveedores/id/' . $id . '/delete', 'DELETE' );
	}
}