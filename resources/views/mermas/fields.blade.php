<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Marca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::text('marca', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria', 'Categoria:') !!}
    {!! Form::text('categoria', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::number('precio', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>

<!-- Diametro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diametro', 'Diametro:') !!}
    {!! Form::text('diametro', null, ['class' => 'form-control']) !!}
</div>

<!-- Largo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('largo', 'Largo:') !!}
    {!! Form::number('largo', null, ['class' => 'form-control']) !!}
</div>

<!-- Ancho Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ancho', 'Ancho:') !!}
    {!! Form::number('ancho', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mermas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
