<form action="{{route('proveedor.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
    </div>
    <div class="form-group">
        {{ Form::label('empresa', 'Empresa') }}
        {{ Form::text('empresa', null, ['class' => 'form-control', 'id' => 'empresa']) }}
    </div>
    <div class="form-group">
        {{ Form::label('direccion', 'Dirección') }}
        {{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Correo') }}
        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
    </div>
    <div class="form-group">
        <label for="telefono"></label>
        <input type="text" class="input-medium bfh-phone form-control" data-format="+58 (ddd) ddd-dddd" name="telefono"
               id="telefono">
    </div>
    <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    </div>
</form>