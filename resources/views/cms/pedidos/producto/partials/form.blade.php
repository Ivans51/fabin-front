<form action="{{route('pedidos.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('category_id', 'Categorías') }}
        {{--{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}--}}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Nombre de la etiqueta') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
    </div>
    <div class="form-group">
        {{ Form::label('slug', 'URL amigable') }}
        {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
    </div>
    <div class="form-group">
        {{ Form::label('image', 'Imagen') }}
        {{ Form::file('image') }}
    </div>
    <div class="form-group">
        {{ Form::label('excerpt', 'Extracto') }}
        {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Descripción') }}
        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    </div>
</form>
