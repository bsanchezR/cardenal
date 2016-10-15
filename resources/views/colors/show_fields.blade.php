<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <p>{!! $color->id !!}</p>
    </div>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <p>{!! $color->nombre !!}</p>
    </div>
</div>

<!-- Codigo Field -->
<div class="form-group">
    {!! Form::label('codigo', 'Codigo:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <p>{!! $color->codigo !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <p>{!! $color->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <p>{!! $color->updated_at !!}</p>
    </div>
</div>
