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
    {{ Form::label('telefono', 'Teléfono') }}
    {{ Form::text('telefono', null, ['class' => 'form-control', 'id' => 'telefono']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>