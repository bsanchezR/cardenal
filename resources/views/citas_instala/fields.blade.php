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
    {!! Form::label('cliente', 'Cliente:') !!}
    @if(isset($selec))
      {!! Form::text('cliente', $selec->cliente->nombre, ['class' => 'form-control','onChange' => 'checar()']) !!}
    @else
      {!! Form::text('cliente', null, ['class' => 'form-control','onChange' => 'checar()']) !!}
    @endif
</div>

<div class="form-group col-sm-4">
    {!! Form::label('direccion', 'Direccion:') !!}
    @if(isset($selec))
      {!! Form::text('direccion', $selec->cliente->direccion, ['class' => 'form-control','onChange' => 'checar()']) !!}
    @else
      {!! Form::text('direccion', null, ['class' => 'form-control','onChange' => 'checar()']) !!}
    @endif
</div>

<div class="form-group col-sm-4">
    {!! Form::label('pedido_id', 'Folio del pedido:') !!}
      <select class="form-control" name="pedido_id" id="pedido_id">
        @foreach($pedidos as $ped)
        @if(isset($selec))
          @if($selec-> id == $ped->id)
            <option value="{{$ped->id}}" selected>{{$ped->folio}}</option>
          @else
            <option value="{{$ped->id}}">{{$ped->folio}}</option>
            @endif
        @else
          <option value="{{$ped->id}}">{{$ped->folio}}</option>
        @endif
        @endforeach
      </select>
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


<!-- Notas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notas', 'Notas:') !!}
    {!! Form::textarea('notas', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-7" style="text-align:center;;">

    <a id="enviar" class="btn btn-primary hidden">Enviar</a>
    <a href="{!! route('citas_instala.index') !!}" class="btn btn-default">Cancelar</a>
</div>

<span id="loader"><p><img src="{{asset('images/svg-loaders/ball-triangle.svg')}}" alt="Cargando ..." /></p></span>

<script type="text/javascript">
	var usuario={!! Auth::user() !!};
	console.log(usuario);
	function checar()
	{
    console.log('entro');
		var flag=false;
		if($('#nombre').val() == '')
		{
			flag=true;
		}
		if($('#direccion').val() == '')
		{
			flag=true;
		}
		if(flag == false)
		{
			$('#enviar').removeClass('hidden');
		}
	}
  $(document).ready(function()
  {
      $('#loader').hide();
      var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		if(dd<10)
		{
			dd='0'+dd
		}
		if(mm<10)
		{
			mm='0'+mm
		}
		today = yyyy+'-'+mm+'-'+dd;
      $('#fecha').val(today);
      $('#enviar').click(function()
      {
        var form = document.getElementById('forms_p');

        var hiddenField = document.createElement("input");
	    hiddenField.setAttribute("type", "hidden");
	    hiddenField.setAttribute("name", "creo");
	    hiddenField.setAttribute("value", usuario.name);
	    form.appendChild(hiddenField);

        form.submit();
        $('#loader').show();
      });
  });
</script>
