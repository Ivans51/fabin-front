<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/15/2018
 * Time: 7:48
 */

namespace App\Repositories;

class AuditoriaRepo extends GuzzleHTTPRequest
{

    public function indexAuditoria() {
        return $this->get('/api/users/levelusers');
    }
}