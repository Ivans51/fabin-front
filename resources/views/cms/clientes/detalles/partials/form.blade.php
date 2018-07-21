<form action="{{route('clientes.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
    {{ Form::label('email', 'Correo') }}
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>
<div class="form-group">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
    {{ Form::label('telefono', 'Teléfono') }}
    {{ Form::text('telefono', null, ['class' => 'form-control', 'id' => 'telefono']) }}
</div>
<div class="form-group">
    {{ Form::label('direccion_fiscal', 'Dirección fiscal') }}
    {{ Form::text('direccion_fiscal', null, ['class' => 'form-control', 'id' => 'direccion_fiscal']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
</form>