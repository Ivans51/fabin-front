<form action="{{route('medidas.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
	{{ Form::label('descripcion', 'Descripcion') }}
	{{ Form::text('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion']) }}
</div>
<div class="form-group">
	{{ Form::label('descripcion_larga', '') }}
	{{ Form::text('descripcion_larga', null, ['class' => 'form-control', 'id' => 'descripcion_larga']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
</form>