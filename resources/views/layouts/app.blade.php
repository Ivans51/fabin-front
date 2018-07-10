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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/effects.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @auth()
        <div class="sidenav-custom">
            <a href="{{ url('/') }}">Inicio</a>
            <button class="dropdown-btn-custom">Catálogo
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('producto.index') }}">Producto</a>
                <a href="{{ route('categoria.index') }}">Categoría</a>
                <a href="{{ route('medidas.index') }}">Unidades de medida</a>
            </div>
            <button class="dropdown-btn-custom">Pago
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{route('metodos.index')}}">Métodos</a>
                <a href="{{route('preferencias.index')}}">Preferencias</a>
                <a href="{{route('iva.index')}}">IVA</a>
            </div>
            <button class="dropdown-btn-custom">Ventas
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{route('ventas.index')}}">Detalles</a>
            </div>
            <a href="{{route('clientes.index')}}">Clientes</a>
            <button class="dropdown-btn-custom">Pedidos
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{route('pedidos.index')}}">Crear</a>
                <a href="{{route('pedidos_status')}}">Status</a>
                <a href="{{route('pedidos.index')}}">Todos</a>
            </div><button class="dropdown-btn-custom">Usuarios
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{route('usuarios.index')}}">Crear</a>
                <a href="{{route('usuarios_history')}}">Historial</a>
                <a href="{{route('usuarios_todos')}}">Todos</a>
            </div>
            <button class="dropdown-btn-custom">Operaciones
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{route('auditoria.index')}}">Auditoria</a>
                <a href="{{route('respaldo.index')}}">Respaldo</a>
                <a href="{{route('manual.index')}}">Manual</a>
            </div>
        </div>
    @endauth
    <div class="custom-container d-flex justify-content-between">
        @auth()
            <div class="container-left"></div>@endauth
    <!-- /. NAV TOP  -->
        <div style="flex: 1">
            @auth()
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-0">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Fabin') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavDropdown"
                            aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            {{--<li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>--}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            @endauth
            @yield('content')
        </div>
    </div>
</div>

<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dropdown.js') }}"></script>
{{--<script src="{{ asset('js/effect-dropdown.js') }}"></script>--}}
<script src="{{ asset('js/effect-modal.js') }}"></script>
</body>
</html>
