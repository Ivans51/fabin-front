@extends('layouts.app')

@section('content')
    @push('styles')
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    @endpush
    <div class="container">
        <div class="card">
            {{--<img src="{{URL::asset('img/logo.png')}}" alt="profile Pic" height="80" width="80">--}}
            <h1 class="ml-3 text-center mt-3">Inicio de Sesion</h1>
            <div class="container">
                <form class="form-horizontal" method="POST" action="{{route('usuario_login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Correo</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email"
                                   value="{{--{{ old('email') }}--}}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group{{--{{ $errors->has('password') ? ' has-error' : '' }}--}}">
                        <label for="contrasenha" class="col-md-4 control-label">Contraseña</label>

                        <div class="col-md-12">
                            <input id="contrasenha" type="password" class="form-control" name="contrasenha" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           name="remember" {{--{{ old('remember') ? 'checked' : '' }}--}}>
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-dark">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
