@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('cms.modal', ['view' => 'cms.catalogo.medidas.partials.form', 'button' => 'Agregar medidas', 'title' => 'IVA', 'header' => 'Agregar medidas'])
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
                                    <td>{{ $dato->id_impiuesto }}</td>
                                    <td>{{ $dato->nombre }}</td>
                                    <td width="10px">
                                        <a href="{{ route('iva.edit', $dato->id_impiuesto) }}"
                                           class="btn btn-sm btn-default">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['iva.destroy', $dato->id_impiuesto], 'method' => 'DELETE']) !!}
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
