<div class="form-group">
    {{ Form::label('nombre', 'Nombre del producto') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
    {{ Form::label('imagen', 'Imagen') }}
    {{ Form::file('imagen') }}
</div>
<div class="form-group">
    {{ Form::label('estado', 'Estado') }}
    <label>
        {{ Form::radio('estado', '1') }} Publicado
    </label>
    <label>
        {{ Form::radio('estado', '0') }} No Publicado
    </label>
</div>
<div class="form-group">
    {{ Form::label('id_category', 'Categorías') }}
    {{ Form::select('id_category', $categories, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('id_proveedor', 'Proveedores') }}
    {{ Form::select('id_proveedor', $proveedores, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('id_unidad', 'Unidad de medida') }}
    {{ Form::select('id_unidad', $unidades, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('id_stock', 'Stock') }}
    {{ Form::select('id_stock', $stock, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('id_impuesto', 'IVA') }}
    {{ Form::text('id_impuesto', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
