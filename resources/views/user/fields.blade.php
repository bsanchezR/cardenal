<div class="form-group">
    {!! Form::label('name', 'Nombre:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('name', null, ['class' => 'form-control ']) !!}
    </div>
</div>

<div class="form-group">
  {!! Form::label('tipo_usuario', 'Tipo de Usuario:', ['class' => 'control-label col-sm-3']) !!}
  <div class="col-sm-6">
  {{ Form::select('tipo_usuario', ['vendedor' => 'Vendedor','comprador' => 'Comprador','administrador' => 'Administrador','admin' => 'Administrador (Sin privilegios)','productor' => 'Productor','instalador' => 'Instalador'], null, ['class' => 'form-control']) }}
  </div>
</div>

<div class="form-group">
    {!! Form::label('telefono', 'Telefono :', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('telefono', null, ['class' => 'form-control', 'data-parsley-error-message' => 'El correo ingresado no es valido.']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail :', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::email('email', null, ['class' => 'form-control','data-parsley-required-message' => 'Porfavor ingresa tu email','data-parsley-error-message' => 'El correo ingresado no es valido.']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('password', 'Password :', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
  
    {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
</div>
<!-- Submit Field -->
<div class="bg-default text-center pad20A mrg25T">
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-lg btn-primary']) !!}
    <a href="{!! route('user.index') !!}" class="btn btn-lg btn-default">Cancelar</a>
</div>
</div>
