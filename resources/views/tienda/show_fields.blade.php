<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $tienda->id !!}</p>
    </div>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $tienda->nombre !!}</p>
    </div>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $tienda->direccion !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('horario', 'Horario:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $tienda->horario !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('telefono', 'Telefono:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $tienda->telefono !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $tienda->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $tienda->updated_at !!}</p>
    </div>
</div>
