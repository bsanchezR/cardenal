<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <p>{!! $user->id !!}</p>
    </div>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $user->name !!}</p>
    </div>
</div>

<!-- Apellido Paterno Field -->
<div class="form-group">
    {!! Form::label('apellido_p', 'Telefono:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $user->telefono !!}</p>
    </div>
</div>

<!-- Colonia Field -->
<div class="form-group">
    {!! Form::label('tipo_usuario', 'Tipo Usuario:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $user->tipo_usuario !!}</p>
  </div>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('email', 'E-mail:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $user->email !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $user->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
    <p>{!! $user->updated_at !!}</p>
    </div>
</div>
