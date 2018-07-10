@extends('layouts.app')

@section('content')
    {{--<div class="panel-heading dropdown-effect mb-3">
        <button class="accordion">Crear nuevo producto</button>
        <div class="panel-accordion">
            @include('cms.catalogo.productos-create', ['post' => 'hello'])
        </div>
    </div>--}}
    <div class="panel-heading modal-effect mb-3">
        <!-- Trigger/Open The Modal -->
        <button id="myBtn" class="accordion">Todos los usuarios</button>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Modal Header</h3>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    @include('cms.usuarios.detalles.create', ['product' => 'hello'])
                </div>
                <div class="modal-footer">
                    <h3>Modal Footer</h3>
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
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td width="10px">
                                        <a href="{{ route('usuarios.show', $product->id) }}"
                                           class="btn btn-sm btn-default">Ver</a>
                                    </td>
                                    <td width="10px">
                                        <a href="{{ route('usuarios.edit', $product->id) }}"
                                           class="btn btn-sm btn-default">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['usuarios.destroy', $product->id], 'method' => 'DELETE']) !!}
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
