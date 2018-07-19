@extends('layouts.app')

@section('content')

    <div class="panel-heading modal-effect mb-3">
        <!-- Trigger/Open The Modal -->
        <button id="myBtn" class="accordion">Añadir métodos</button>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Crear método de pago</h3>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    @include('cms.pago.metodos.partials.form')
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
                            {{--<tbody>
                            @foreach($data as $dato)
                                <tr>
                                    <td>{{ $dato->id_articulo }}</td>
                                    <td>{{ $dato->nombre }}</td>
                                    <td width="10px">
                                        <a href="{{ route('metodos.edit', $dato->id_articulo) }}"
                                           class="btn btn-sm btn-default">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['metodos.destroy', $dato->id_articulo], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>--}}
                        </table>

                        {{--{!!  $products->render() !!}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
