@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('cms.modal', ['view' => 'cms.catalogo.categoria.partials.form', 'button' => 'Agregar categoría', 'title' => 'Categorías', 'header' => 'Agregar categoría'])
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $dato)
                                <tr>
                                    <td>{{ $dato->Id_categoria }}</td>
                                    <td>{{ $dato->nombre }}</td>
                                    <td width="10px">
                                        <a href="{{ route('categoria.edit', $dato->Id_categoria) }}"
                                           class="btn btn-sm btn-default">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['categoria.destroy', $dato->Id_categoria], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{--{!!  $products->render() !!}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
