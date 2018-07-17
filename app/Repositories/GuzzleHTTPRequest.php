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
        ]);
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

    public function doRequestHeader($arr, $uri, $method)
    {
        try {
            $response = $this->client->request($method, $uri, [
                'headers' => ['autorizacion' => session('user_token')],
                'form_params' => $arr
            ]);
            $res = json_decode($response->getBody()->getContents());

            return $res;
        } catch (GuzzleException $e) {
            return $e->getMessage() . ' - ' . $e->getCode();
        }
    }

    public function doRequest($arr, $uri, $method)
    {
        try {
            $response = $this->client->request($method, $uri, [
                'form_params' => $arr
            ]);
            $res = json_decode($response->getBody()->getContents());

            return $res;
        } catch (GuzzleException $e) {
            return $e->getMessage() . ' - ' . $e->getCode();
        }
    }

    public function getView($res, $infoView, $array)
    {
        if (is_string($res)) {
            return abort(404, $res);
        } else {
            if ($res->StatusCode == 200) {
                return $this->getViewInfo($infoView->view, $infoView->infoSuccesful, $array);
            } else {
                return $this->getViewInfo($infoView->view, $infoView->infoError, $array);
            }
        }
    }

    public function setInfoView($view, $infoSuccesful, $infoError) {
        return (object) ['view' => $view, 'infoSuccesful' => $infoSuccesful, 'infoError' => $infoError];
    }

    public function getViewInfo($view, $info, $array)
    {
        session()->flash('info', $info);

        return view($view, compact($array));
    }

}