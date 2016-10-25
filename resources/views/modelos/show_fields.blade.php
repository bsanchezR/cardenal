<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $modelo->id !!}</p>
    </div>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $modelo->nombre !!}</p>
    </div>
</div>

<!-- Marca Id Field -->
<div class="form-group">
    {!! Form::label('marca_id', 'Marca Id:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $modelo->marca_id !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('max_ancho', 'Ancho Máximo:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $modelo->max_ancho !!}</p>
    </div>
</div>

<!-- Codigo Field -->
<div class="form-group">
    {!! Form::label('codigo', 'Codigo:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $modelo->codigo !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $modelo->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $modelo->updated_at !!}</p>
    </div>
</div>
