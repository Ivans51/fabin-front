@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel-heading modal-effect mb-3 mt-3">
            <!-- Trigger/Open The Modal -->
            <button id="myBtn" class="accordion">Añadir proveedor</button>
            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Añadir Proveedor</h3>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('proveedor.store')}}" method="POST">
                            {{ csrf_field() }}
                            @include('cms.proveedor.detalles.partials.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
