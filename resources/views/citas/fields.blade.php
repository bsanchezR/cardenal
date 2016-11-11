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

<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
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

<!-- Id Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    {!! Form::number('id_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Notas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notas', 'Notas:') !!}
    {!! Form::textarea('notas', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('citas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
