<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Crear entrada
                </div>

                <div class="panel-body">
                    {!! Form::model($product, ['route' => ['usuarios.update', $product], 'method' => 'PUT', 'files' => true]) !!}

                    @include('cms.usuarios.detalles.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>