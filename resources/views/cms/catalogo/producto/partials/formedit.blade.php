<form action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('id_proveedor', 'Proveedores') }}
        <select id="id_proveedor" name="id_proveedor" class="form-control">
            <option value="0">Seleccionar</option>
            @foreach ($proveedores as $key => $value)
                <option value="{{ $value->id_proveedor }}"
                        {{--@if ($key == old('myselect', $model->option))
                        selected="selected"
                        @endif--}}
                        @if ($data[0][0]->id_proveedor == $value->id_proveedor)
                        selected="selected"
                        @endif
                >{{ $value->Nombre_proveedor }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre del producto') }}
        {{ Form::text('nombre', $data[0]->nombre, ['class' => 'form-control', 'id' => 'nombre']) }}
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
                <option value="{{ $value->Id_categoria }}"
                        @if ($data[0]->Id_categoria == $value->Id_categoria)
                        selected="selected"
                        @endif
                >{{ $value->descripcion_larga }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('id_unidad_medida', 'Unidad de medida') }}
        <select id="id_unidad_medida" name="id_unidad_medida" class="form-control">
            <option value="0">Seleccionar</option>
            @foreach ($unidades as $key => $value)
                <option value="{{ $value->id_unidad_medida }}"
                        @if ($data[0]->id_unidad_medida == $value->id_unidad_medida)
                        selected="selected"
                        @endif
                >{{ $value->descripcion_larga }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('cantidad', 'Unidades a registrar') }}
        {{ Form::text('cantidad', $data[0]->cantidad, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_impiuesto', 'IVA') }}
        <select id="id_impiuesto" name="id_impiuesto" class="form-control">
            <option value="0">Seleccionar</option>
            @foreach ($iva as $key => $value)
                <option value="{{ $value->id_impiuesto }}"
                        {{--@if ($key == old('myselect', $model->option))
                        selected="selected"
                        @endif--}}
                        @if ($data[0]->id_impiuesto == $value->id_impiuesto)
                        selected="selected"
                        @endif
                >{{ $value->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    </div>
</form>