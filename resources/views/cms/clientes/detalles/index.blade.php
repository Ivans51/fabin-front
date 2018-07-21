@extends('layouts.app')

@section('content')
    <div class="container">
        @include('cms.modal', ['view' => 'cms.clientes.detalles.partials.form', 'button' => 'Agregar cliente', 'header' => 'Agregar cliente'])
        <div class="row">
            <div class="col-md-12 col-md-offset-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Lista de Clientes</h3>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tbody>
                            @foreach($data as $dato)
                                <tr>
                                    <td>{{ $dato->Id_cliente }}</td>
                                    <td>{{ $dato->Nombre }}</td>
                                    <td>{{ $dato->telefon }}</td>
                                    <td>{{ $dato->direccion_fiscal }}</td>
                                    <td width="10px">
                                        <a href="{{ route('clientes.edit', $dato->Id_cliente) }}"
                                           class="btn btn-sm btn-default">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['clientes.destroy', $dato->Id_cliente], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
