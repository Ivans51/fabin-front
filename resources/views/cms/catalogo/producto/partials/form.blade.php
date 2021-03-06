<form action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('id_proveedor', 'Proveedores') }}
        <select id="id_proveedor" name="id_proveedor" class="form-control">
            <option value="0">Seleccionar</option>
            @foreach ($proveedores as $key => $value)
                <option value="{{ $value->id_proveedor }}">{{ $value->Nombre_proveedor }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre del producto') }}
        {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
    </div>
    <div class="form-group">
        {{ Form::label('imagen', 'Imagen') }}
        {{ Form::file('imagen', ['class' => 'form-control', 'id' => 'imagen']) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_categoria', 'Categorías') }}
        <select id="id_categoria" name="id_categoria" class="form-control">
            @foreach ($categories as $key => $value)
                <option value="0">Seleccionar</option>
                {{--<option value="{{ $key }}" {{ old('designation') == $key ? 'selected' : ''}}>{{ $value }}</option>--}}
                <option value="{{ $value->Id_categoria }}">{{ $value->descripcion_larga }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('id_unidad_medida', 'Unidad de medida') }}
        <select id="id_unidad_medida" name="id_unidad_medida" class="form-control">
            <option value="0">Seleccionar</option>
            @foreach ($unidades as $key => $value)
                <option value="{{ $value->id_unidad_medida }}">{{ $value->descripcion_larga }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('cantidad', 'Unidades a registrar') }}
        {{ Form::text('cantidad', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_impiuesto', 'IVA') }}
        <select id="id_impiuesto" name="id_impiuesto" class="form-control">
            <option value="0">Seleccionar</option>
            @foreach ($iva as $key => $value)
                <option value="{{ $value->id_impiuesto }}">{{ $value->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    </div>
</form>