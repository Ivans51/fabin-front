<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fabin') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('formhelpers/dist/css/bootstrap-formhelpers.min.css') }}" media="screen">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/effects.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<div id="app">
    @if(session('user_token'))
        <div class="sidenav-custom">
            <div class="d-flex justify-content-center mb-3 mt-1">
                <img src="{{URL::asset('img/logo.png')}}" alt="profile Pic" height="100" width="100" class="">
            </div>
            <a href="{{ url('/') }}"><i class="fas fa-home pr-2"></i>Inicio</a>
            <button class="dropdown-btn-custom"><i class="fas fa-list-alt pr-2"></i>Catálogo
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('producto.index') }}">Producto</a>
                <a href="{{ route('categoria.index') }}">Categoría</a>
                <a href="{{ route('medidas.index') }}">Unidades de medida</a>
            </div>
            <button class="dropdown-btn-custom"><i class="fas fa-dollar-sign pr-2"></i>Pago
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{route('metodos.index')}}">Métodos</a>
                <a href="{{route('preferencias.index')}}">Preferencias</a>
                <a href="{{route('iva.index')}}">IVA</a>
            </div>
            <button class="dropdown-btn-custom"><i class="fas fa-shopping-cart pr-2"></i>Ventas
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{route('ventas.index')}}">Detalles</a>
            </div>
            <a href="{{route('clientes.index')}}"><i class="fas fa-address-book pr-2"></i>Clientes</a>
            <a href="{{route('proveedor.index')}}"><i class="fas fa-address-book pr-2"></i>Proveedores</a>
            <button class="dropdown-btn-custom"><i class="fas fa-shipping-fast pr-2"></i>Pedidos
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{route('pedidos.index')}}">Crear</a>
                <a href="{{route('pedidos_status')}}">Status</a>
                <a href="{{route('pedidos.index')}}">Todos</a>
            </div>
            <button class="dropdown-btn-custom"><i class="fas fa-users pr-2"></i>Usuarios
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{route('usuario_show_register')}}">Crear Usuario</a>
                <a href="{{route('usuario_show_reset')}}">Cambiar mi Clave</a>
                <a href="{{route('usuarios_todos')}}">Todos</a>
            </div>
            <button class="dropdown-btn-custom"><i class="fas fa-users-cog pr-2"></i>Operaciones
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{route('auditoria.index')}}">Auditoria</a>
                <a href="{{route('respaldo.index')}}">Respaldo</a>
                <a href="{{route('manual.index')}}">Manual</a>
            </div>
            <a href="{{ route('usuario_close') }}"><i class="fas fa-sign-out-alt pr-2"></i>Cerrar Sessión</a>
        </div>
    @endif
    <div class="custom-container d-flex justify-content-between">
        @if(session('user_token'))
            <div class="container-left"></div>@endif
        <div style="flex: 1">
            @if(session('user_token'))
                @yield('content')
            @else
                @yield('content-login')
            @endif
            @if (session('info'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ session('info') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('formhelpers/dist/js/bootstrap-formhelpers.min.js') }}"></script>
<script src="{{ asset('js/dropdown.js') }}"></script>
{{--<script src="{{ asset('js/effect-dropdown.js') }}"></script>--}}
<script src="{{ asset('js/effect-modal.js') }}"></script>
</body>
</html>
