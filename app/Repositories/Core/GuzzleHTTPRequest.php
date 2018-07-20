<?php
/**
 * Created by PhpStorm.
 * User: Ivans
 * Date: 7/15/2018
 * Time: 8:05
 */

namespace App\Repositories\Core;

use App\Repositories\Core\ManagerRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleHTTPRequest extends ManagerRequest {
	protected $client;

	/**
	 * Client constructor.
	 */
	public function __construct() {
		$this->client = new Client( [
			'base_uri' => 'http://165.227.96.113:5010'
			/*'base_uri' => 'localhost:5010'*/
		] );
	}

	public function doRequest( $url, $method ) {
		$response = '';
		try {
			$response = $this->client->request( $method, $url );
		} catch ( GuzzleException $e ) {
			error_log( $e->getMessage() );
		}

		return json_decode( $response->getBody()->getContents() );
	}

	public function doRequestHeader( $url, $method ) {
		try {
			$response = $this->client->request( $method, $url, [
				'headers' => [ 'autorizacion' => session( 'user_token' ) ]
			] );

			return json_decode( $response->getBody()->getContents() );
		} catch ( GuzzleException $e ) {
			return $e->getMessage() . ' - ' . $e->getCode();
		}
	}

	public function doRequestBody( $arr, $uri, $method ) {
		try {
			$response = $this->client->request( $method, $uri, [
				'form_params' => $arr
			] );

			return json_decode( $response->getBody()->getContents() );
		} catch ( GuzzleException $e ) {
			return $e->getMessage() . ' - ' . $e->getCode();
		}
	}

	public function doRequestBodyHeader( $arr, $uri, $method ) {
		try {
			$response = $this->client->request( $method, $uri, [
				'headers'     => [ 'autorizacion' => session( 'user_token' ) ],
				'form_params' => $arr
			] );
			$res      = json_decode( $response->getBody()->getContents() );

			return $res;
		} catch ( GuzzleException $e ) {
			return $e->getMessage() . ' - ' . $e->getCode();
		}
	}

}