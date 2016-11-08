<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cupon->id !!}</p>
</div>

<!-- Numero Field -->
<div class="form-group">
    {!! Form::label('numero', 'Numero:') !!}
    <p>{!! $cupon->numero !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $cupon->estado !!}</p>
</div>

<!-- Porcentaje Field -->
<div class="form-group">
    {!! Form::label('porcentaje', 'Porcentaje:') !!}
    <p>{!! $cupon->porcentaje !!}</p>
</div>

<!-- Descuento Field -->
<div class="form-group">
    {!! Form::label('descuento', 'Descuento:') !!}
    <p>{!! $cupon->descuento !!}</p>
</div>

<!-- Vigencia Field -->
<div class="form-group">
    {!! Form::label('vigencia', 'Vigencia:') !!}
    <p>{!! $cupon->vigencia !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $cupon->tipo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cupon->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cupon->updated_at !!}</p>
</div>
