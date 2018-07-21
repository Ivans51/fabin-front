<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Repositories\UsuariosRepo;
use Illuminate\Http\Request;

class UsuarioLoginController extends Controller {
	protected $repo;

	/**
	 * UsuarioLoginController constructor.
	 *
	 * @param UsuariosRepo $repo
	 */
	public function __construct(UsuariosRepo $repo ) {
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
		if ( $this->repo->isSuccessful($res) ) {
            session( [ 'user_token' => $res->Data->token ] );
            session( [ 'user_info' => $res->Data ] );
            return (new SampleChart())->chart();
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
			$infoView = $this->repo->setInfoView('cms.register', 'Usuario Registrado', 'Error en registro');

            return $this->repo->getCode($res, $infoView) == 200 ? $this->showLogin() : abort(404, 'Error creando categoría');
		} else {
			session()->flash( 'info', 'Datos erroneos' );

			return $this->showRegister();
		}
	}

	public function showRegister() {
        $nivel      = $this->repo->nivelUser();
        if ($this->repo->isSuccessful($nivel)) {
            $nivelValue = array('Seleccionar');
            for ($i = 0; $i < count($nivel->Data); $i++) {
                $nivelValue[] = $nivel->Data[$i]->descripcion;
            }
            $data = $nivelValue;
            return view( 'cms.register', compact( 'data' ) );
        } else {
            abort (404, 'Error');
        }
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
		$infoView = $this->repo->setInfoView('cms.login', 'Contraseña cambiada', 'Datos erroneos');
		return $this->repo->getView($res, $infoView );
	}

	public function close() {
		session()->forget('user_info');
		session()->forget('user_token');
		session()->flush();
		return redirect()->route('usuario_show_login');
	}
}
