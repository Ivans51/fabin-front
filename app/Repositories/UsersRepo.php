<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/15/2018
 * Time: 7:48
 */

namespace App\Repositories;

class UsersRepo extends GuzzleHTTPRequest
{

    public function indexUser() {
        return $this->get('/posts');
    }

    public function nivelUser() {
        return $this->get('/api/users/levelusers');
    }

    public function loginUser($arr) {
        return $this->doRequest( $arr, '/api/users/login', 'POST' );
    }

    public function registerUser($arr) {
        return $this->postHeader( $arr, '/api/users/register/onlyuser', 'POST' );
    }

    public function resetUser($arr, $id) {
        return $this->doRequest( $arr, '/api/users/update/user/id/' . $id, 'PUT' );
    }
}