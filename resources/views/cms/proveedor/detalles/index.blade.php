@extends('layouts.app')

@section('content')
    <div class="container">
        @include('cms.modal', ['view' => 'cms.proveedor.detalles.partials.form', 'button' => 'Agregar proveedor', 'header' => 'Agregar proveedor'])
        <div class="row">
            <div class="col-md-12 col-md-offset-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('cms.proveedor.detalles.partials.errors')
                        <h3>Lista de Proveedores</h3>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tbody>
                            @foreach($data as $dato)
                                <tr>
                                    <td>{{ $dato->id_proveedor }}</td>
                                    <td>{{ $dato->Nombre_proveedor }}</td>
                                    <td width="10px">
                                        <a href="{{ route('proveedor.edit', $dato->id_proveedor) }}"
                                           class="btn btn-sm btn-default">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['proveedor.destroy', $dato->id_proveedor], 'method' => 'DELETE']) !!}
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
