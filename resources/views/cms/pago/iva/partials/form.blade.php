<form action="{{route('iva.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
    </div>
    <div class="form-group">
        {{ Form::label('porcentaje', 'Porcentaje') }}
        {{ Form::text('porcentaje', null, ['class' => 'form-control', 'id' => 'porcentaje']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    </div>
</form>