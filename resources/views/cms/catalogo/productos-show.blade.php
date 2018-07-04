@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Products
                        <a href="{{ route('producto.create') }}" class="pull-right btn btn-sm btn-primary">
                            Crear
                        </a>
                    </div>

                    <div class="panel-body">

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td width="10px">
                                        <a href="{{ route('producto.show', $post->id) }}"
                                           class="btn btn-sm btn-default">Ver</a>
                                    </td>
                                    <td width="10px">
                                        <a href="{{ route('producto.edit', $post->id) }}"
                                           class="btn btn-sm btn-default">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['producto.destroy', $post->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{--{!!  $posts->render() !!}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
