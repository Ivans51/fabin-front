@extends('layouts.app')

@section('content')

    <div class="panel-heading modal-effect mb-3">
        <!-- Trigger/Open The Modal -->
        <button id="myBtn" class="accordion">Añadir medida</button>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h3></h3>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    @include('cms.catalogo.medidas.partials.form')
                </div>
                <div class="modal-footer">
                    <h3></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Lista de Productos</h3>
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
                                    <td>{{ $dato->id_unidad_medida }}</td>
                                    <td>{{ $dato->descripcion_larga }}</td>
                                    <td width="10px">
                                        <a href="{{ route('medidas.edit', $dato->id_unidad_medida) }}"
                                           class="btn btn-sm btn-default">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['medidas.destroy', $dato->id_unidad_medida], 'method' => 'DELETE']) !!}
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
