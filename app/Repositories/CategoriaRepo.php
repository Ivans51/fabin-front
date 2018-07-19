<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/15/2018
 * Time: 7:48
 */

namespace App\Repositories;

class CategoriaRepo extends GuzzleHTTPRequest
{

    public function indexCategoria() {
        return $this->doRequestHeader( '/api/categorias/getall', 'GET' );
    }

    public function create( $arr ) {
        return $this->doRequestBodyHeader( $arr, '/api/categorias/register', 'POST' );
    }

    public function edit( $arr, $id ) {
        return $this->doRequestBodyHeader( $arr, '/api/categorias/edit/id/' . $id , 'PUT' );
    }

    public function delete( $id ) {
        return $this->doRequestHeader( '/api/categorias/delete/id/' . $id , 'DELETE' );
    }

    public function showEdit( $id ) {
        return $this->doRequestHeader( '/api/proveedores/id/' . $id . '/data', 'GET' );
    }
}