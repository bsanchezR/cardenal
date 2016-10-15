<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $marca->id !!}</p>
    </div>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $marca->nombre !!}</p>
    </div>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $marca->descripcion !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $marca->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $marca->updated_at !!}</p>
    </div>
</div>
