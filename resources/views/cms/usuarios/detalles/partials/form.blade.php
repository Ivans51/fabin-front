<div class="form-group">
    {{ Form::label('contrasenha', 'Contraseña') }}
    {{ Form::text('contrasenha', null, ['class' => 'form-control', 'id' => 'contrasenha']) }}
</div>
<div class="form-group">
    {{ Form::label('confirn_contrasenha', 'Repetir contraseña') }}
    {{ Form::text('confirn_contrasenha', null, ['class' => 'form-control', 'id' => 'confirn_contrasenha']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
