@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row p-4">
                <h3>Hubo un error en el servidor</h3>
                <p>Mensaje de error: {{ $exception->getMessage() }}</p>
            </div>
        </div>
    </div>
@endsection