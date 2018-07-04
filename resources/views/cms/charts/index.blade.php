@extends('layouts.app')

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Usuarios</h2>
                    <div class="d-flex justify-content-between">
                        <h5>Agregue un usuario</h5>
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario">
                            Agregar un nuevo usuario
                        </button>
                    </div>
                </div>
            </div>
            <hr/>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!--    Context Classes  -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>username</th>
                                        <th>opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>' . ( $key + 1 ) . '</td>
                                        <td>' . $value["username"] . '</td>
                                        <td>
                                            <button class="btn btn-default btnEditarUsuario"><i
                                                        class="fa fa-pen-square"></i></button>
                                            <button class="btn btn-default btnEliminarUsuario"><i
                                                        class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
            <!-- /. ROW  -->
        </div>
    </div>
@endsection