<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cita->id !!}</p>
</div>

<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $cita->titulo !!}</p>
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{!! $cita->fecha !!}</p>
</div>

<!-- Hora Field -->
<div class="form-group">
    {!! Form::label('hora', 'Hora:') !!}
    <p>{!! $cita->hora !!}</p>
</div>

<!-- Id Cliente Field -->
<div class="form-group">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    <p>{!! $cita->id_cliente !!}</p>
</div>

<!-- Notas Field -->
<div class="form-group">
    {!! Form::label('notas', 'Notas:') !!}
    <p>{!! $cita->notas !!}</p>
</div>

<!-- Asignar Field -->
<div class="form-group">
    {!! Form::label('asignar', 'Asignar:') !!}
    <p>{!! $cita->asignar !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cita->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cita->updated_at !!}</p>
</div>

