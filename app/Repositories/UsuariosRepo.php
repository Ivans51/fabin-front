<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/15/2018
 * Time: 7:48
 */

namespace App\Repositories;

class UsuariosRepo extends GuzzleHTTPRequest
{

    public function indexUser() {
        return $this->doRequest( '/posts', 'GET' );
    }

    public function nivelUser() {
        return $this->doRequest( '/api/users/levelusers', 'GET' );
    }

    public function loginUser($arr) {
        return $this->doRequestBody( $arr, '/api/users/login', 'POST' );
    }

    public function registerUser($arr) {
        return $this->doRequestBodyHeader( $arr, '/api/users/register/onlyuser', 'POST' );
    }

    public function resetUser($arr, $id) {
        return $this->doRequestBody( $arr, '/api/users/update/user/id/' . $id, 'PUT' );
    }

    public function allUsers() {
	    return $this->doRequestHeader( '/api/users/all', 'GET' );
    }

	public function delete( $id ) {
		return $this->doRequestHeader( 'api/users/delete/user/id/' . $id, 'DELETE' );
	}

	public function edit( $arr, $id ) {
		return $this->doRequestBodyHeader( $arr, '/api/users/update/user/id/' . $id, 'PUT' );
	}
}