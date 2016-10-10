<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <p>{!! $cliente->id !!}</p>
    </div>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $cliente->nombre !!}</p>
    </div>
</div>

<!-- Apellido Paterno Field -->
<div class="form-group">
    {!! Form::label('apellido_paterno', 'Apellido Paterno:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $cliente->apellido_paterno !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('apellido_materno', 'Apellido Materno:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $cliente->apellido_materno !!}</p>
    </div>
</div>

<!-- Colonia Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo Cliente:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $cliente->tipo !!}</p>
  </div>
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Direccion:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $cliente->direccion !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('telefono', 'Telefono:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $cliente->telefono !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('telefono2', 'Telefono 2:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $cliente->telefono2 !!}</p>
    </div>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('email', 'E-mail:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $cliente->email !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $cliente->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $cliente->updated_at !!}</p>
    </div>
</div>
