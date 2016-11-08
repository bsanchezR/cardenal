<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::number('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Selection type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo de descuento:') !!}
    {{ Form::select('tipo_descuento ', [
       '1' => 'Porcentaje',
       '2' => 'Descuento'],null,['id' => 'tipo_descuento']
    ) }}
</div>

<!-- Porcentaje Field -->
<div class="form-group col-sm-6" id="por">
    {!! Form::label('porcentaje', 'Porcentaje:') !!}
    {!! Form::number('porcentaje', null, ['class' => 'form-control']) !!}
</div>

<!-- Descuento Field -->
<div class="form-group col-sm-6" id="des">
    {!! Form::label('descuento', 'Descuento:') !!}
    {!! Form::number('descuento', null, ['class' => 'form-control']) !!}
</div>

<!-- Vigencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vigencia', 'Vigencia:') !!}
    {!! Form::date('vigencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cupons.index') !!}" class="btn btn-default">Cancelar</a>
</div>
