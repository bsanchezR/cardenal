<div class="form-group">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('nombre', null, ['class' => 'form-control ']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('apellido_paterno', 'Apellido Paterno:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('apellido_paterno', null, ['class' => 'form-control ']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('apellido_materno', 'Apellido Materno:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('apellido_materno', null, ['class' => 'form-control ']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('direccion', null, ['class' => 'form-control ']) !!}
    </div>
</div>

<div class="form-group">
  {!! Form::label('tipo', 'Tipo de Cliente:', ['class' => 'control-label col-sm-3']) !!}
  <div class="col-sm-6">
  {{ Form::select('tipo', ['normal' => 'Normal','distribuidor' => 'Distribuidor'], null, ['class' => 'form-control']) }}
  </div>
</div>

<div class="form-group">
    {!! Form::label('telefono', 'Telefono :', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('telefono2', 'Telefono 2 :', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('telefono2', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail :', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Submit Field -->
<div class="bg-default text-center pad20A mrg25T">
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-lg btn-primary']) !!}
    <a href="{!! route('cliente.index') !!}" class="btn btn-lg btn-default">Cancelar</a>
</div>
</div>
