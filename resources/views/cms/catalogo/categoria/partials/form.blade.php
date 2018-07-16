<div class="form-group">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
    {{ Form::label('descripcion_larga', '') }}
    {{ Form::text('descripcion_larga', null, ['class' => 'form-control', 'id' => 'descripcion_larga']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
