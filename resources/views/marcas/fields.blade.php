<div class="form-group">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Submit Field -->
<div class="bg-default text-center pad20A mrg25T">
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-lg btn-primary']) !!}
    <a href="{!! route('marcas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
</div>
