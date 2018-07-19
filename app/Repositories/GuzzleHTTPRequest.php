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

class GuzzleHTTPRequest {
	protected $client;

	/**
	 * Client constructor.
	 */
	public function __construct() {
		$this->client = new Client( [
			/*'base_uri' => 'http://165.227.96.113:5010'*/
			'base_uri' => 'localhost:5010'
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

	public function getCode( $res, $infoView ) {
		if ( is_string( $res ) ) {
			return 500;
		} else {
			if ( $res->StatusCode == 200 ) {
				session()->flash( 'info', $infoView->infoSuccesful );

				return 200;
			} else {
				session()->flash( 'info', $infoView->infoError );

				return 400;
			}
		}
	}

	public function getView( $res, $infoView, $data, $multiple = false ) {
		if ( is_string( $res ) ) {
			return abort( 500, $res );
		} else {
			if ( $res->StatusCode == 200 ) {
				if ( $multiple ) {
					return $this->getViewInfoMultiple( $infoView->view, $infoView->infoSuccesful, $data );
				} else {
					return $this->getViewInfo( $infoView->view, $infoView->infoSuccesful, $data );
				}
			} else {
				if ( $multiple ) {
					return $this->getViewInfoMultiple( $infoView->view, $infoView->infoSuccesful, $data );
				} else {
					return $this->getViewInfo( $infoView->view, $infoView->infoSuccesful, $data );
				}
			}
		}
	}

	public function getViewInfoMultiple( $view, $info, $data ) {
		session()->flash( 'info', $info );

		return view( $view )->with( $data );
	}

	public function getViewInfo( $view, $info, $data ) {
		session()->flash( 'info', $info );

		return view( $view, compact( 'data' ) );
	}

	public function setInfoView( $view, $infoSuccesful, $infoError ) {
		return (object) [ 'view' => $view, 'infoSuccesful' => $infoSuccesful, 'infoError' => $infoError ];
	}

}