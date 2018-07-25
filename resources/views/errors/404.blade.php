@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <h3 class="d-block">Hubo un error en el servidor</h3>
            <p>Mensaje de error: {{ $exception->getMessage() }}</p>
            <a href="{{ url()->previous() }}" class="btn btn-default">Volver a la página anterior</a>
        </div>
    </div>
@endsection