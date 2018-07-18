@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Control de auditoria</h3>
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
                                    <td>{{ $dato->id_auditoria }}</td>
                                    <td>{{ $dato->nombre }}</td>
                                    <td>{{ $dato->descrjipcion }}</td>
                                    <td>{{ $dato->fecha_acceso }}</td>
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
