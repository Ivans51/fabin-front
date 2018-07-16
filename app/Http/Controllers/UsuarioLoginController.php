<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepo;
use Illuminate\Http\Request;

class UsuarioLoginController extends Controller {
	protected $repo;

	/**
	 * UsuarioLoginController constructor.
	 *
	 * @param UsersRepo $repo
	 */
	public function __construct( UsersRepo $repo ) {
		$this->repo = $repo;
	}

	public function showLogin() {
		return view( 'cms.login' );
	}

	public function login( Request $request ) {
		$arr = [
			'email'       => $request->input( 'email' ),
			'contrasenha' => $request->input( 'contrasenha' )
		];
		$res = $this->repo->loginUser( $arr );
		if ( $res->StatusCode != null ) {
			if ( $res->StatusCode == 200 ) {
				session( [ 'user_token' => $res->Data->token ] );
				session( [ 'user_info' => $res->Data ] );

				return view( 'cms.charts.index' );
			} else {
				return $this->repo->getViewInfo( 'cms.login', 'Datos errones', [] );
			}
		} else {
			return $this->repo->getViewInfo( 'cms.login', 'Datos errones', [] );
		}
	}

	public function register( Request $request ) {
		$confirm  = $request->input( 'contrasenha_confirm' );
		$email    = $request->input( 'email' );
		$clave    = $request->input( 'contrasenha' );
		$id_nivel = $request->input( 'nivel' );
		if ( $confirm == $clave && $id_nivel != 0 ) {
			$arr = [
				'email'                   => $email,
				'contrasenha'             => $clave,
				'id_usuario_tipo_usuario' => $id_nivel
			];
			$res = $this->repo->registerUser( $arr );

			return $this->statusRegister( $res );
		} else {
			session()->flash( 'info', 'Datos erroneos' );

			return $this->showRegister();
		}
	}

	/**
	 * @param $res
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function statusRegister( $res ) {
		if ( is_string( $res ) ) {
			return $this->repo->getViewInfo( 'cms.register', 'Usuario Registrado', array( 'nivelValue' => $this->getNivel() ) );
		} else {
			if ( $res->StatusCode == 200 ) {
				return $this->repo->getViewInfo( 'cms.register', 'Usuario Registrado', array( 'nivelValue' => $this->getNivel() ) );
			} else {
				return $this->repo->getViewInfo( 'cms.register', 'Usuario Registrado', array( 'nivelValue' => $this->getNivel() )  );
			}
		}
	}

	/**
	 * @return array
	 */
	public function getNivel(): array {
		$nivel      = $this->repo->nivelUser()->Data;
		$nivelValue = array( 'Seleccionar' );
		for ( $i = 0; $i < count( $nivel ); $i ++ ) {
			$nivelValue[] = $nivel[ $i ]->descripcion;
		}

		return $nivelValue;
	}

	public function showRegister() {
		$nivelValue = $this->getNivel();

		return view( 'cms.register', compact( 'nivelValue' ) );
	}

	public function showReset() {
		$user = session( 'user_info' )->user;

		return view( 'cms.usuarios.detalles.show', compact( 'user' ) );
	}

	public function reset( Request $request ) {
		$arr = [
			'email'       => $request->input( 'email' ),
			'contrasenha' => $request->input( 'contrasenha' )
		];
		$res = $this->repo->resetUser( $arr, session( 'user_info' ) );
		if ( $res->StatusCode != null ) {
			if ( $res->StatusCode == 200 ) {
				return $this->repo->getViewInfo( 'cms.login', 'Password Reset', [] );
			} else {
				return $this->repo->getViewInfo( 'cms.login', 'Datos errones', [] );
			}
		} else {
			return $this->repo->getViewInfo( 'cms.login', 'Datos errones', [] );
		}
	}
}
