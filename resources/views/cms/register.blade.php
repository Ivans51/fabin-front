@extends('layouts.app')

@section('content')
    @push('styles')
        <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    @endpush
    <div class="container login-container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mt-3 mb-3 text-center d-flex">
                        <h1 class="ml-3">Registrar usuario</h1>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('usuario_register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-10 control-label">Correo</label>
                                <div class="col-md-12">
                                    <input id="email" type="text" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="contrasenha" class="col-md-10 control-label">Contraseña</label>

                                <div class="col-md-12">
                                    <input id="contrasenha" type="password" class="form-control" name="contrasenha" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contrasenha_confirm" class="col-md-10 control-label">Confirmar Contraseña</label>

                                <div class="col-md-12">
                                    <input id="contrasenha_confirm" type="password" class="form-control"
                                           name="contrasenha_confirm" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nivel" class="col-md-10 control-label">Nivel de usuario</label>

                                <div class="col-md-12">
                                    {{ Form::select('nivel', $data, null, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
