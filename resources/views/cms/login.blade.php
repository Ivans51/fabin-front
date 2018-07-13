@extends('layouts.app')

@section('content')
    @push('styles')
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    @endpush
    <div class="container login-container">
        <div class="panel panel-default">
            <div class="panel-heading mt-3 mb-3 text-center d-flex justify-content-around">
                <img src="{{URL::asset('img/logo.png')}}" alt="profile Pic" height="100" width="100">
                <h3 class="align-self-center">Login</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{route('usuario_login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email"
                                   value="{{--{{ old('email') }}--}}" required autofocus>

                            {{--@if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif--}}
                        </div>
                    </div>

                    <div class="form-group{{--{{ $errors->has('password') ? ' has-error' : '' }}--}}">
                        <label for="contrasehna" class="col-md-4 control-label">Password</label>

                        <div class="col-md-12">
                            <input id="contrasehna" type="password" class="form-control" name="contrasehna" required>

                            {{--@if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif--}}
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

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-dark">
                                Login
                            </button>

                            <a class="btn btn-dark" href="#">
                                Recordar contraseña
                            </a>

                            <a class="btn btn-dark" href="{{ route('usuario_register') }}">
                                Registrar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
