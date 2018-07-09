@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar entrada
                    </div>

                    <div class="panel-body">
                        {{--{!! Form::model($product, ['route' => ['producto.update', $product], 'method' => 'PUT', 'files' => true]) !!}

                        @include('cms.catalogo.partials.form')

                        {!! Form::close() !!}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection