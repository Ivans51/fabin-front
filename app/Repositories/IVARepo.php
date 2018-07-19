<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/15/2018
 * Time: 7:48
 */

namespace App\Repositories;

class IVARepo extends GuzzleHTTPRequest
{

    public function indexIVA() {
        return $this->doRequestHeader( '/api/iva/getall', 'GET' );
    }

    public function create( $arr ) {
        return $this->doRequestBodyHeader( $arr, '/api/iva/register', 'POST' );
    }

    public function edit( $arr, $id ) {
        return $this->doRequestBodyHeader( $arr, '/api/iva/edit/id/' . $id , 'PUT' );
    }

    public function delete( $id ) {
        return $this->doRequestHeader( '/api/iva/delete/id/' . $id , 'DELETE' );
    }

    public function showEdit( $id ) {
        return $this->doRequestHeader( '/api/iva/get/id/' . $id . '/data', 'GET' );
    }
}