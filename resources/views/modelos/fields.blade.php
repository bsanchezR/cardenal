<div class="form-group">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('max_ancho', 'Ancho máximo:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('max_ancho', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('color', 'Color:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('precio', 'Precio al público:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('precio', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
  {!! Form::label('id_tipo', 'Tipo :', ['class' => 'control-label col-sm-3']) !!}
  <div class="col-sm-6">
  <select class="form-control" name="id_tipo">
      <option value="1">Shangrila</option>
      <option value="2">Sheer</option>
      <option value="3">Enrrollable</option>
      <option value="4">Vertical</option>
      <option value="5">Romana</option>
      <option value="6">Panel Japones</option>
      <option value="7">Open Romana</option>
  </select>
  </div>
</div>

<!-- Submit Field -->
<div class="bg-default text-center pad20A mrg25T">
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-lg btn-primary']) !!}
    <a href="{!! route('modelos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
</div>
