<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/15/2018
 * Time: 8:05
 */

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleHTTPRequest
{
    protected $client;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://165.227.96.113:5010'
        ]);;
    }

    public function get($url)
    {
        $response = '';
        try {
            $response = $this->client->request('GET', $url);
        } catch (GuzzleException $e) {
            error_log($e->getMessage());
        }
        return json_decode($response->getBody()->getContents());
    }

    public function postUser($arr)
    {
        try {
            $response = $this->client->request('POST', '/api/users/login', [
                'form_params' => $arr
            ]);
            $res = json_decode($response->getBody()->getContents());
            return $res;
        } catch (GuzzleException $e) {
            return $e->getMessage() . ' - ' . $e->getCode();
        }
    }

    public function getView(int $status, $view, $var)
    {
        return $status == 200 ? view($view, compact($var)) : abort(404);
    }

}