@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detalles del pedido
                    </div>

                    <div class="panel-body">
                        <p><strong>Nombre</strong> {{ $product->title }}</p>
                        <p><strong>Descripción</strong> {{ $product->body }}</p>
                    </div>
                    <a href="{{ URL::previous() }}">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
