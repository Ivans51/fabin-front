<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/15/2018
 * Time: 7:48
 */

namespace App\Repositories;

class ClientesRepo extends GuzzleHTTPRequest {

	public function indexClientes() {
		return $this->doRequestHeader( '/api/users/clients', 'GET' );
	}

	public function create( $arr ) {
		return $this->doRequestBodyHeader( $arr, '/api/proveedores/newproveedor', 'POST' );
	}

	public function edit( $arr, $id ) {
		return $this->doRequestBodyHeader( $arr, '/api/proveedores/id/' . $id . '/edi', 'PUT' );
	}

	public function delete( $id ) {
		return $this->doRequestHeader( '/api/users/delete/client/id/' . $id , 'DELETE' );
	}

	public function showEdit( $id ) {
		return $this->doRequestHeader( '/api/proveedores/id/' . $id . '/data', 'GET' );
	}
}