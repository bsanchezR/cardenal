<script type="text/javascript" src="{{ asset('widgets/datepicker/datepicker.js')}}"></script>
  <script type="text/javascript">
      /* Datepicker bootstrap */
      $(function() {
          "use strict";
          $('.bootstrap-datepicker').bsdatepicker({
              format: 'yyyy-mm-dd'
          });
      });
  </script>
<script type="text/javascript" src="{{asset('widgets/timepicker/timepicker.js')}}"></script>
  <script type="text/javascript">
      /* Timepicker */

      $(function() {
          "use strict";
          $('.timepicker-example').timepicker({
                showSeconds: true,
                showMeridian: false,
          });
      });
  </script>

<div class="form-group col-sm-4">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
    {!! Form::text('apellido_paterno', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('apellido_materno', 'Apellido Materno:') !!}
    {!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('direccion', 'Direccion:') !!}
      {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('telefono', 'Telefono:') !!}
      {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email:') !!}
      {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', null, ['class' => 'form-control bootstrap-datepicker']) !!}
</div>


<!-- Hora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hora', 'Hora:') !!}
    {!! Form::text('hora', null, ['class' => 'form-control timepicker-example']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('tienda_id', 'Tienda:') !!}
    <select class="form-control" name="tienda_id">
      @foreach($tiendas as $tienda)
        <option value="{!! $tienda->id !!}"> {!! $tienda->nombre !!}</option>
      @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('medio', '¿ Como se entero ?:') !!}
    <select class="form-control" name="medio">
        <option value="tiendas">Tiendas</option>
        <option value="redes">Redes</option>
        <option value="espectacular">Espectacular</option>
        <option value="recomendacion">Recomendacion</option>
    </select>
</div>

<!-- Notas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notas', 'Notas:') !!}
    {!! Form::textarea('notas', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-7" style="text-align:center;;">

    <a id="enviar" class="btn btn-primary">Enviar</a>
    <a href="{!! route('citas.index') !!}" class="btn btn-default">Cancelar</a>
</div>

<span id="loader"><p><img src="{{asset('images/svg-loaders/ball-triangle.svg')}}" alt="Cargando ..." /></p></span>

<script type="text/javascript">
  $(document).ready(function()
  {
      $('#loader').hide();
      $('#enviar').click(function()
      {
        var form = document.getElementById('forms_p');
        form.submit();
        $('#loader').show();
      });
  });
</script>
