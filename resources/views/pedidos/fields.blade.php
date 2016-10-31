<div class="form-group col-sm-6">
    {!! Form::label('tipo_p', 'Tipo Persiana:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <select class="form-control" name="tipo" id="tipo" onchange="tipos()" onfocusout='cambia_tipo()'>
        <option value="-1">---</option>
        <option value="enrrollable">Enrrollable</option>
        <option value="sheer">Sheer</option>
        <option value="romana">Romana</option>
        <option value="horizontal">Horizontal</option>
        <option value="vertical">Vertical</option>
        <option value="plisada">Plisada</option>
        <option value="japones">Panel Japones</option>
        <option value="shangri-la">Shangri-la</option>
      </select>

    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('folio', 'Folio:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      @if(isset($nuevas))
        {!! Form::text('folio', null, ['class' => 'form-control', 'id' => 'foli_m','disabled'=>'disabled']) !!}
      @elseif(isset($mismas))
        {!! Form::text('folio', null, ['class' => 'form-control', 'id' => 'foli_m','disabled'=>'disabled']) !!}
      @else
        {!! Form::text('folio', null, ['class' => 'form-control', 'id' => 'foli_n']) !!}
      @endif
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('marca', 'Marca:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <select class="form-control" name="marca_id" id="marca_id" onchange='misFun()'>
    </select>
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('modelo', 'Modelo:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <select class="form-control" name="modelos_id" id="modelos_id" onchange='misFunction()'>
      </select>
    </div>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('color_id', 'Color:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <select class="form-control" name="color" id="color_id" onchange="enviar()">
    </select>
    </div>
</div>

@if(isset($nuevas))
<div class="form-group col-sm-6 hidden">
@elseif(isset($mismas))
<div class="form-group col-sm-6 hidden">
@else
<div class="form-group col-sm-6">
@endif
    {!! Form::label('cliente_id', 'Cliente:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <select class="form-control" name="cliente_id">
      @foreach($clientes as $cliente)
        @if(isset($pedido) && $pedido->cliente_id == $cliente->id)
          <option value="{{$cliente->id}}" selected="selected">{{$cliente->nombre}}</option>
        @else
          <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
        @endif
      @endforeach
    </select>
    <a class="right btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cliente.create') !!}">Nuevo Cliente</a>
    </div>
</div>

@if(isset($nuevas))
<div class="form-group col-sm-6 hidden">
@elseif(isset($mismas))
<div class="form-group col-sm-6 hidden">
@else
<div class="form-group col-sm-6">
@endif
    {!! Form::label('user_id', 'Vendedor:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <select class="form-control" name="user_id">
      @foreach($usuarios as $usuario)
        @if(isset($pedido) && $pedido->user_id == $usuario->id)
          <option value="{{$usuario->id}}" selected='slected'>{{$usuario->name}}</option>
        @else
          <option value="{{$usuario->id}}">{{$usuario->name}}</option>
        @endif
      @endforeach
    </select>
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('numero', 'No de Persianas a cotizar:', ['class' => 'control-label col-sm-5']) !!}
    <div class="col-sm-4">
    {!! Form::number('numero', null, ['class' => 'form-control', 'id' => 'noper' , 'onchange' => 'cuantas()']) !!}
    </div>
</div>

<div id="divider1" class="col-sm-12 divider" style ="margin-top:10px; margin-bottom:10px; background:red;"></div>
<div id="divider2" class="col-sm-12 divider" style ="margin-top:10px; margin-bottom:10px; background:red;"></div>

<div id="persianas" class="">

</div>

<div id="divider3" class="col-sm-12 divider" style ="margin-top:10px; margin-bottom:10px; background:red;"></div>
<div id="divider4" class="col-sm-12 divider" style ="margin-top:10px; margin-bottom:10px; background:red;"></div>

<div class="form-group">
    {!! Form::label('control', 'Observaciones:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::textarea('control', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Fecha Pedido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_pedido', 'Fecha Pedido:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if(isset($pedido))
        {!! Form::date('fecha_pedido', $pedido->fecha_pedido, ['class' => 'form-control', 'onchange' => 'listo()','data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'La fecha de pedido es obligatoria.']) !!}
    @else
        {!! Form::date('fecha_pedido', null, ['class' => 'form-control', 'onchange' => 'listo()','data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'La fecha de pedido es obligatoria.']) !!}
    @endif
    </div>
</div>

<!-- Fecha Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_entrega', 'Fecha Entrega:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if(!isset($pedido) || $pedido->fecha_entrega == '' || $pedido->fecha_entrega == NULL)
      {!! Form::date('fecha_entrega', null, ['class' => 'form-control']) !!}
    @else
    {!! Form::date('fecha_entrega', $pedido->fecha_entrega, ['class' => 'form-control']) !!}
    @endif
    </div>
</div>

<!-- Fechaa Produccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_produccion', 'Fecha Produccion:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if(!isset($pedido) || $pedido->fecha_produccion == '' || $pedido->fecha_produccion == NULL)
      {!! Form::date('fecha_produccion', null, ['class' => 'form-control']) !!}
    @else
      {!! Form::date('fecha_produccion', $pedido->fecha_produccion, ['class' => 'form-control']) !!}
    @endif
    </div>
</div>

<!-- Fecha Instalacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_instalacion', 'Fecha Instalacion:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if(!isset($pedido) || $pedido->fecha_instalacion == '' || $pedido->fecha_instalacion == NULL)
      {!! Form::date('fecha_instalacion', null, ['class' => 'form-control']) !!}
    @else
      {!! Form::date('fecha_instalacion', $pedido->fecha_instalacion, ['class' => 'form-control']) !!}
    @endif
    </div>
</div>

<!-- Submit Field -->
<div class="bg-default text-center pad20A mrg25T" style="margin-top:150px !important;">
<div class="form-group col-sm-12">

    <a id="subir" class="btn btn-lg btn-primary">Avanzar</a>
    <a href="{!! route('pedidos.index') !!}" class="btn btn-lg btn-default">Cancelar</a>

    <a id="mismas" class="btn btn-lg btn-default">Mismas medidas</a>
    <a id="nuevas" class="btn btn-lg btn-default">Nuevas medidas</a>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Persianas</h4>
          </div>
          <div class="modal-body">
            <h5>Selecciona las persianas de las cuales extraer las medidas:</h5>
            <div id="selec_persianas">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="mismas_ya">Avanzar</button>
          </div>
        </div>
      </div>
    </div>
</div>
</div>

<span id="loader"><p><img src="{{asset('images/svg-loaders/ball-triangle.svg')}}" alt="Cargando ..." /></p></span>

<script type="text/javascript" src="{{ asset('widgets/modal/modal.js') }}"></script>
<script type="text/javascript">
var ancho_max=0;
var tipos_s;
@if(isset($mismas))
  var mismas = {!! $mismas !!};
  var num_persianas = {!! $num_persianas !!};
  var persianas_medidas =' {!! $persianas_medidas !!} ';
@endif

$('#subir').click(function()
{
  $('input').each(function() {
       if ($(this).attr('disabled')) {
           $(this).removeAttr('disabled');
       }
   });
   $('select').each(function() {
        if ($(this).attr('disabled')) {
            $(this).removeAttr('disabled');
        }
    });
    console.log('ya termino');
    var form = document.getElementById('forms_p');
    form.submit();
});

$('#mismas_ya').click(function()
{
  var total=$('#noper').val();
  var conta=0;
  var persi=[];
  for(var i=0;i<total;i++)
  {
    if(document.getElementById('pers_check'+i).checked)
    {
      conta++;
      var cadena=$('#ancho'+i).val()+','+$('#alto'+i).val();
      persi.push(cadena);
    }
  }
  $('input').each(function() {
       if ($(this).attr('disabled')) {
           $(this).removeAttr('disabled');
       }
   });
   $('select').each(function() {
        if ($(this).attr('disabled')) {
            $(this).removeAttr('disabled');
        }
    });
    var form = document.getElementById('forms_p');
    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "mismas");
    hiddenField.setAttribute("value", '1');
    form.appendChild(hiddenField);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "mismas_total");
    hiddenField.setAttribute("value", conta);
    form.appendChild(hiddenField);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "mismas_medidas");
    hiddenField.setAttribute("value", persi);
    form.appendChild(hiddenField);
    form.submit();
});

$('#mismas').click(function()
{
  var total=$('#noper').val();
  $('#selec_persianas').empty();
  for(var i=0;i<total;i++)
  {
    $('#selec_persianas').append('<label class="checkbox-inline"><input type="checkbox" id="pers_check'+i+'" value="'+i+'">P'+(i+1)+'</label>');
  }
  //console.log($('#selec_persianas'));
  $('#myModal').modal('toggle');
});

$('#nuevas').click(function()
{
  $('input').each(function() {
       if ($(this).attr('disabled')) {
           $(this).removeAttr('disabled');
       }
   });
   $('select').each(function() {
        if ($(this).attr('disabled')) {
            $(this).removeAttr('disabled');
        }
    });
    console.log('ya termino');
    var form = document.getElementById('forms_p');
    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "nuevas");
    hiddenField.setAttribute("value", '1');
    form.appendChild(hiddenField);
    form.submit();
});

$(document).ready(function()
{
    $('#loader').hide();
    $('#subir').hide();
    $('#mismas').hide();
    $('#nuevas').hide();
    $('#divider1').hide();
    $('#divider2').hide();
    $('#divider3').hide();
    $('#divider4').hide();
    //console.log(new Date().getYear(),new Date().getMonth(),new Date().getDate(),new Date().getHours(),new Date().getMinutes(),new Date().getSeconds(),new Date().getUTCMilliseconds());
    var folio=''+new Date().getYear()+''+new Date().getMonth()+''+new Date().getDate()+''+new Date().getHours()+''+new Date().getMinutes()+''+new Date().getSeconds()+''+new Date().getUTCMilliseconds();
    //console.log(folio);
    if(document.getElementById('foli_n') != null && document.getElementById('foli_n') != undefined)
    {
      $('#foli_n').val(folio);
      document.getElementById('foli_n').setAttribute('disabled', true);
    }
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });
    if(mismas != undefined && mismas == 1)
    {
      $('#noper').val(num_persianas);
      cuantas();
      var medidas_coma = persianas_medidas.split(",");
      for(var i=0;i<num_persianas;i++)
      {
        $('#ancho'+i).val(medidas_coma[i+i]);
        $('#alto'+i).val(medidas_coma[(i+i)+1]);
      }
      for(var i=0;i<num_persianas;i++)
      {
        calcular(i);
      }
    }
});

function ancho_maximo(modelos)
{
  toolt();
//   var x = document.getElementById("modelo_id").value;
// //  var total=$('#noper').val();
//   for (var i = 0; i < modelos.length; i++)
//   {
//     if(modelos[i].id == x)
//     {
//       ancho_max=modelos[i].max_ancho;
//       // for (var j = 0; j < total; j++)
//       // {
//       //   $('#ancho'+j).attr('title','Ancho Máximo: '+modelos[i].max_ancho);
//       //   $('#ancho'+j).attr('data-original-title','Ancho Máximo: '+modelos[i].max_ancho);
//       // }
//       toolt();
//       break;
//     }
//   }
}

function toolt()
{
  var total=$('#noper').val();
  for (var j = 0; j < total; j++)
  {
    $('#ancho'+j).attr('title','Ancho Máximo: '+ancho_max);
    $('#ancho'+j).attr('data-original-title','Ancho Máximo: '+ancho_max);
  }
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
}

function enviar()
{
  var y = document.getElementById("tipo").value;
  var x;
  switch (y)
  {
    case 'enrrollable': x=3;
                        break;
    case 'shangri-la':  x=1;
                        break;
    case 'sheer':       x=2;
                        break;
    case 'vertical':    x=4;
                        break;
    case 'romana':      x=5;
                        break;
    case 'japones':     x=6;
                        break;
    default:            x=-1;
                        break;

  }
  var cadena=x+','+$('#marca_id').val()+','+$('#modelos_id').val()+','+$('#color_id').val()
  $.ajax({
        url: 'http://localhost:8000/get_id/'+cadena,
        type: 'GET',
        dataType: 'json',
        beforeSend: function()
        {
          $('#loader').show();
        },
        async:true,
        error: function(data)
        {
          $('#loader').delay(500).fadeOut("slow");
          var form = document.getElementById('forms_p');
          var hiddenField = document.createElement("input");
          hiddenField.setAttribute("type", "hidden");
          hiddenField.setAttribute("name", "modelo_id");
          hiddenField.setAttribute("value", -1);
          form.appendChild(hiddenField);
        },
        success: function (data)
        {
          $('#loader').delay(500).fadeOut("slow");
          //console.log(data.data[0]);
          ancho_max=data.data[0].max_ancho;
          var form = document.getElementById('forms_p');
          var hiddenField = document.createElement("input");
          hiddenField.setAttribute("type", "hidden");
          hiddenField.setAttribute("name", "modelo_id");
          hiddenField.setAttribute("value", data.data[0].id);
          form.appendChild(hiddenField);
          ancho_maximo();
        }
      });
}

function tipos()
{
  ancho_max=0;
  ancho_maximo();
  var y = document.getElementById("tipo").value;
  var selectList = document.getElementById("marca_id");
  var x;
  $('#marca_id').empty();
  $('#color_id').empty();
  $('#modelos_id').empty();
  switch (y)
  {
    case 'enrrollable': x=3;
                        break;
    case 'shangri-la':  x=1;
                        break;
    case 'sheer':       x=2;
                        break;
    case 'vertical':    x=4;
                        break;
    case 'romana':      x=5;
                        break;
    case 'japones':     x=6;
                        break;
    default:            x=-1;
                        break;

  }
  tipos_s=x;

  $.ajax({
        url: 'http://localhost:8000/marc/'+x,
        type: 'GET',
        dataType: 'json',
        beforeSend: function()
        {
          $('#loader').show();
        },
        async:true,
        error: function(data)
        {
          $('#loader').delay(500).fadeOut("slow");
        //	console.log(data,'error');
          $('#marca_id').empty();
          var option = document.createElement("option");
          option.value = -1;
          option.text = '---';
          selectList.appendChild(option);
        },
        success: function (data)
        {
          $('#loader').delay(500).fadeOut("slow");
          //console.log('marcas',data);
          $('#marca_id').empty();
          var option = document.createElement("option");
          option.value = -1;
          option.text = '---';
          selectList.appendChild(option);
          for(var i=0;i<data.data.length;i++)
          {
            var option = document.createElement("option");
            option.value = data.data[i].marca_id;
            switch (data.data[i].marca_id)
            {
              case 1: option.text = 'Bling';
                      break;
              case 2: option.text = 'Threeshades';
                      break;
              case 3: option.text = 'Orly';
                      break;
              default:

            }
            selectList.appendChild(option);
          }
        }
      });
}

function misFunction()
{
  ancho_max=0;
  ancho_maximo();
  var x = document.getElementById("modelos_id").value;
  var selectList = document.getElementById("color_id");
  // //var selectList = document.createElement("select");
  // //selectList.id = "mySelect";
  // //selectList.className = "form-control";
  // //myDiv.appendChild(selectList);
  // $('#color_id').empty();
  // for (var i = 0; i < modelos.length; i++)
  // {
  //     if(modelos[i].id == x)
  //     {
  //       for(var j=0;j<modelos[i].colors.length;j++)
  //       {
  //         var option = document.createElement("option");
  //         option.value = modelos[i].colors[j].id;
  //         option.text = modelos[i].colors[j].nombre;
  //         selectList.appendChild(option);
  //       }
  //     }
  // }
  $.ajax({
        url: 'http://localhost:8000/colo/'+x+','+tipos_s,
        type: 'GET',
        dataType: 'json',
        beforeSend: function()
        {
          $('#loader').show();
        },
        async:true,
        error: function(data)
        {
          $('#loader').delay(500).fadeOut("slow");
        	//console.log(data,'error');
          $('#color_id').empty();
          var option = document.createElement("option");
          option.value = -1;
          option.text = '---';
          selectList.appendChild(option);
        },
        success: function (data)
        {
          $('#loader').delay(500).fadeOut("slow");
          //console.log(data);
          $('#color_id').empty();
          var option = document.createElement("option");
          option.value = -1;
          option.text = '---';
          selectList.appendChild(option);
          for(var i=0;i<data.data.length;i++)
          {
            var option = document.createElement("option");
            option.value = data.data[i].color;
            option.text = data.data[i].color;
            selectList.appendChild(option);
          }
        }
      });
}

function misFun()
{
  ancho_max=0;
  ancho_maximo();
  var x = document.getElementById("marca_id").value;
  var selectList = document.getElementById("modelos_id");
  // //var selectList = document.createElement("select");
  // //selectList.id = "mySelect";
  // //selectList.className = "form-control";
  // //myDiv.appendChild(selectList);
  // $('#modelo_id').empty();
  // for (var i = 0; i < marcas.length; i++)
  // {
  //     if(marcas[i].id == x)
  //     {
  //       for(var j=0;j<marcas[i].modelos.length;j++)
  //       {
  //         var option = document.createElement("option");
  //         option.value =marcas[i].modelos[j].id;
  //         option.text = marcas[i].modelos[j].nombre;
  //         selectList.appendChild(option);
  //       }
  //     }
  // }
//onfocusout='ancho_maximo()'
$('#color_id').empty();
  $.ajax({
        url: 'http://localhost:8000/model/'+x+','+tipos_s,
        type: 'GET',
        dataType: 'json',
        beforeSend: function()
        {
          $('#loader').show();
        },
        async:true,
        error: function(data)
        {
          $('#loader').delay(500).fadeOut("slow");
        	//console.log(data.responseText,'error');
          $('#modelos_id').empty();
          var option = document.createElement("option");
          option.value = -1;
          option.text = '---';
          selectList.appendChild(option);
        },
        success: function (data)
        {
          $('#loader').delay(500).fadeOut("slow");
          //console.log(data);
          $('#modelos_id').empty();
          var option = document.createElement("option");
          option.value = -1;
          option.text = '---';
          selectList.appendChild(option);
          for(var i=0;i<data.data.length;i++)
          {
            var option = document.createElement("option");
            option.value = data.data[i].nombre;
            option.text = data.data[i].nombre;
            selectList.appendChild(option);
          }
        }
      });
}

function vincula_motor()
{
  var total=$('#noper').val();
  var posiciones= [];
  var opciones= [];
  var posic= [];
  var opcic= [];
  for(var i =0;i<total;i++)
  {
    if(document.getElementById("sistema"+i).value == 'motorizada')
    {
      if(document.getElementById("mmotor"+i).value == '2 lienzos')
      {
        if(document.getElementById("vinculado"+i).value == ' ' || !$.trim($('#vinculado'+i).html()))
        {
          posiciones.push(i);
          opciones.push('<option id="ve'+(i+1)+'" value="'+(i)+'">P'+(i+1)+'</option>');
        }
      }
      else if(document.getElementById("mmotor"+i).value == '3 lienzos')
      {
        if(document.getElementById("vinculado"+i).value == ' ' || !$.trim($('#vinculado'+i).html()))
        {
          posic.push(i);
          opcic.push('<option id="ve'+(i+1)+'" value="'+(i)+'">P'+(i+1)+'</option>');
        }
      }
      // if(document.getElementById("mmotor"+i).value == ' ' || document.getElementById("mmotor"+i).value == '1 lienzo')
      else
      {
        $('#vinculado'+i).empty();
        $('#vincu'+i).hide();
      }
    }
  }
  opciones.push('<option id="ve" value=" ">---</option>')
  if(posiciones.length > 1)
  {
    for(var i=0;i<posiciones.length;i++)
    {
      $('#vinculado'+posiciones[i]).empty();
      $('#vincu'+posiciones[i]).show();
      for(var j=opciones.length-1;j>=0;j--)
      {
        if(i != j)
        {
          $('#vinculado'+posiciones[i]).append(opciones[j]);
        }
      }
    }
  }
  else
  {
    for(var i =0;i<total;i++)
    {
      if(document.getElementById("sistema"+i).value == 'motorizada')
      {
        if(document.getElementById("mmotor"+i).value == '2 lienzos')
        {
          if(document.getElementById("vinculado"+i).value == ' ' || !$.trim($('#vinculado'+i).html()))
          {
              $('#vinculado'+i).empty();
              $('#vincu'+i).hide();
          }
        }
      }
    }
  }
  opcic.push('<option id="ve" value=" ">---</option>')
  // console.log(opcic,posic);
  if(posic.length > 2)
  {
    for(var i=0;i<posic.length;i++)
    {
      $('#vinculado'+posic[i]).empty();
      $('#vincu'+posic[i]).show();
      $('#vinculado'+posic[i]).append('<option id="ve" value=" ">---</option>');
      for(var j=0;j<posic.length;j++)
      {
        for(var h=j;h<posic.length;h++)
        {
          if(i != j && i != h && j != h)
          {
            $('#vinculado'+posic[i]).append('<option id="ve'+j+''+h+'" value="'+posic[j]+','+posic[h]+'">P'+(posic[j]+1)+', P'+(posic[h]+1)+'</option>');
            //$('#vinculado'+posic[i]).append(opcic[j]);
          }
        }
      }
    }
  }
  else
  {
    for(var i =0;i<total;i++)
    {
      if(document.getElementById("sistema"+i).value == 'motorizada')
      {
        if(document.getElementById("mmotor"+i).value == '3 lienzos')
        {
          if(document.getElementById("vinculado"+i).value == ' ' || !$.trim($('#vinculado'+i).html()))
          {
              $('#vinculado'+i).empty();
              $('#vincu'+i).hide();
          }
        }
      }
    }
  }
}

function cambiar_manual(pos)
{
  var total=$('#noper').val();
  for(var i=pos+1;i<total;i++)
  {
    if((document.getElementById("vinculado"+i).value == ' ' || !$.trim($('#vinculado'+i).html())) && $('#chequear'+i).css("color")!= 'rgb(0, 128, 0)')
    {
      //console.log($('#chequear'+i).css("color"));
      $('#sistema'+i).val('manual');
      sistema(i);
      $('#soporte'+i).val('2');
      manuales(i);
    }
  }
}

function cambiar_motor(pos)
{
  var total=$('#noper').val();
  var x=document.getElementById("mmotor"+pos).value
  for(var i=pos+1;i<total;i++)
  {
    if((document.getElementById("vinculado"+i).value == ' ' || !$.trim($('#vinculado'+i).html())) && $('#chequear'+i).css("color")!= 'rgb(0, 128, 0)')
    {
      $('#sistema'+i).val('motorizada');
      sistema(i);
      $('#mmotor'+i).val(x);
    }
  }
  vincula_motor();
}

function vinculado()
{
  var total=$('#noper').val();
  var posiciones= [];
  var opciones= [];
  for(var i =0;i<total;i++)
  {
    if(document.getElementById("sistema"+i).value == 'manual')
    {
      if(document.getElementById("soporte"+i).value == 2)
      {
        // console.log(!$.trim($('#vinculado'+i).html()),i);
        if(document.getElementById("vinculado"+i).value == ' ' || !$.trim($('#vinculado'+i).html()))
        {
          posiciones.push(i);
          opciones.push('<option id="ve'+(i+1)+'" value="'+(i)+'">P'+(i+1)+'</option>');
        }
      }
      else
      {
        $('#vinculado'+i).empty();
        $('#vincu'+i).hide();
      }
    }
  }
  opciones.push('<option id="ve" value=" ">---</option>')
  if(posiciones.length > 1)
  {
    for(var i=0;i<posiciones.length;i++)
    {
      $('#vinculado'+posiciones[i]).empty();
      $('#vincu'+posiciones[i]).show();
      for(var j=opciones.length-1;j>=0;j--)
      {
        if(i != j)
        {
          $('#vinculado'+posiciones[i]).append(opciones[j]);
        }
      }
    }
  }
  else
  {
    for(var i =0;i<total;i++)
    {
      if(document.getElementById("sistema"+i).value == 'manual')
      {
        if(document.getElementById("vinculado"+i).value == ' ' || !$.trim($('#vinculado'+i).html()))
        {
            $('#vinculado'+i).empty();
            $('#vincu'+i).hide();
        }
      }
    }
  }
}

function manuales(pos)
{
  var x = document.getElementById("soporte"+pos).value;
  if(x == 1)
  {
    $('#poscic'+pos).hide();
    $('#pos'+pos).val(' ');
  }
  if(x == 2)
  {
    $('#poscic'+pos).show();
    cambiar_manual(pos);
  }
  vinculado();
}

function calcular(i)
{
  console.log(i);
  var x = document.getElementById("sistema"+i).value;
  if(x == 'manual')
  {
    var d=$('#alto'+i).val();
    d=((70*d)/100);
    $('#acont'+i).val(d);
  }
}

function sistema(pos)
{
  var x = document.getElementById("sistema"+pos).value;
  if(x == 'motorizada')
  {
    $('#acont'+pos).val('');
    $('#soporte'+pos).val(' ');
    $('#lado'+pos).val(' ');
    $('#pos'+pos).val(' ');
    $('#dtipom'+pos).show();
    $('#dmmotor'+pos).show();
    $('#dlmotor'+pos).show();
    $('#dlado'+pos).hide();
    $('#dacont'+pos).hide();
    $('#sopor'+pos).hide();
    $('#poscic'+pos).hide();
    vinculado();
    vincula_motor();
  }
  if(x == 'manual')
  {
    $('#dtipom'+pos).hide();
    $('#mmotor'+pos).val(' ');
    $('#tipom'+pos).val(' ');
    $('#lmotor'+pos).val(' ');
    $('#dmmotor'+pos).hide();
    $('#dlmotor'+pos).hide();
    $('#dlado'+pos).show();
    $('#dacont'+pos).show();
    $('#sopor'+pos).show();
    //$('#poscic'+pos).show();
    vincula_motor();
    vinculado();
  }
}

function checa_vin(i)
{
  var total=$('#noper').val();
  if(document.getElementById("sistema"+i).value == 'manual')
  {
    if(document.getElementById("vinculado"+i).value != ' ')
    {
        var vinculada=document.getElementById("vinculado"+i).value;
        var options=document.getElementById("vinculado"+i).options[document.getElementById("vinculado"+i).selectedIndex];
        $('#vinculado'+i).empty();
        $('#vinculado'+i).append('<option id="ve" value=" ">---</option>');
        $('#vinculado'+i).append(options);
        $('#vinculado'+i).val(options.value);
        $('#sistema'+vinculada).val(document.getElementById("sistema"+i).value);
        document.getElementById('sistema'+vinculada).setAttribute('disabled', true);
        // document.getElementById('sistema'+vinculada).readOnly = true;
        document.getElementById('sistema'+i).setAttribute('disabled', true);
        // document.getElementById('sistema'+i).readOnly = true;
        $('#lado'+vinculada).val(document.getElementById("lado"+i).value);
        document.getElementById('lado'+vinculada).setAttribute('disabled', true);
        // document.getElementById('lado'+vinculada).readOnly = true;
        document.getElementById('lado'+i).setAttribute('disabled', true);
        // document.getElementById('lado'+i).readOnly = true;
        document.getElementById('acont'+vinculada).setAttribute('disabled', true);
        // document.getElementById('acont'+vinculada).readOnly = true;
        document.getElementById('acont'+i).setAttribute('disabled', true);
        // document.getElementById('acont'+i).readOnly = true;
        $('#fijar'+vinculada).val(document.getElementById("fijar"+i).value);
        document.getElementById('fijar'+vinculada).setAttribute('disabled', true);
        // document.getElementById('fijar'+vinculada).readOnly = true;
        document.getElementById('fijar'+i).setAttribute('disabled', true);
        // document.getElementById('fijar'+i).readOnly = true;
        $('#marco'+vinculada).val(document.getElementById("marco"+i).value);
        document.getElementById('marco'+vinculada).setAttribute('disabled', true);
        // document.getElementById('marco'+vinculada).readOnly = true;
        document.getElementById('marco'+i).setAttribute('disabled', true);
        // document.getElementById('marco'+i).readOnly = true;
        $('#soporte'+vinculada).val(document.getElementById("soporte"+i).value);
        document.getElementById('soporte'+vinculada).setAttribute('disabled', true);
        // document.getElementById('soporte'+vinculada).readOnly = true;
        document.getElementById('soporte'+i).setAttribute('disabled', true);
        // document.getElementById('soporte'+i).readOnly = true;
        $('#pos'+vinculada).val(document.getElementById("pos"+i).value);
        document.getElementById('pos'+vinculada).setAttribute('disabled', true);
        // document.getElementById('pos'+vinculada).readOnly = true;
        document.getElementById('pos'+i).setAttribute('disabled', true);
        // document.getElementById('pos'+i).readOnly = true;
        $('#vinculado'+vinculada).val(i);
        document.getElementById('vinculado'+vinculada).setAttribute('disabled', true);
        // document.getElementById('vinculado'+vinculada).readOnly = true;
        vinculado();
        cambiar_color(vinculada);
    }
    else
    {
      document.getElementById('sistema'+i).removeAttribute('disabled');
      // document.getElementById('sistema'+i).readOnly = false;
      document.getElementById('lado'+i).removeAttribute('disabled');
      // document.getElementById('lado'+i).readOnly = false;
      document.getElementById('acont'+i).removeAttribute('disabled');
      // document.getElementById('acont'+i).readOnly = false;
      document.getElementById('fijar'+i).removeAttribute('disabled');
      // document.getElementById('fijar'+i).readOnly = false;
      document.getElementById('marco'+i).removeAttribute('disabled');
      // document.getElementById('marco'+i).readOnly = false;
      document.getElementById('soporte'+i).removeAttribute('disabled');
      // document.getElementById('soporte'+i).readOnly = false;
      document.getElementById('pos'+i).removeAttribute('disabled');
      // document.getElementById('pos'+i).readOnly = false;
      document.getElementById('vinculado'+i).removeAttribute('disabled');
      // document.getElementById('vinculado'+i).readOnly = false;
      for(var j=0;j<total;j++)
      {
        if(document.getElementById("vinculado"+j).value != '' && document.getElementById("vinculado"+j).value != ' ' && document.getElementById("vinculado"+j).value == i)
        {
          //console.log(i,j,document.getElementById("vinculado"+j).value);
          document.getElementById('sistema'+j).removeAttribute('disabled');
          // document.getElementById('sistema'+j).readOnly = false;
          document.getElementById('lado'+j).removeAttribute('disabled');
          // document.getElementById('lado'+j).readOnly = false;
          document.getElementById('acont'+j).removeAttribute('disabled');
          // document.getElementById('acont'+j).readOnly = false;
          document.getElementById('fijar'+j).removeAttribute('disabled');
          // document.getElementById('fijar'+j).readOnly = false;
          document.getElementById('marco'+j).removeAttribute('disabled');
          // document.getElementById('marco'+j).readOnly = false;
          document.getElementById('soporte'+j).removeAttribute('disabled');
          // document.getElementById('soporte'+j).readOnly = false;
          document.getElementById('pos'+j).removeAttribute('disabled');
          // document.getElementById('pos'+j).readOnly = false;
          document.getElementById('vinculado'+j).removeAttribute('disabled');
          // document.getElementById('vinculado'+j).readOnly = false;
          $('#vinculado'+j).val(' ');
          vinculado();
          cambiar_color(j);
        }
      }
    }
  }
  if(document.getElementById("sistema"+i).value == 'motorizada')
  {
    if(document.getElementById("vinculado"+i).value != ' ')
    {
      if(document.getElementById("mmotor"+i).value == '2 lienzos')
      {
        var vinculada=document.getElementById("vinculado"+i).value;
        options=document.getElementById("vinculado"+i).options[document.getElementById("vinculado"+i).selectedIndex];
        $('#vinculado'+i).empty();
        $('#vinculado'+i).append('<option id="ve" value=" ">---</option>');
        $('#vinculado'+i).append(options);
        $('#vinculado'+i).val(options.value);
        $('#sistema'+vinculada).val(document.getElementById("sistema"+i).value);
        document.getElementById('sistema'+vinculada).setAttribute('disabled', true);
        // document.getElementById('sistema'+vinculada).readOnly = true;
        document.getElementById('sistema'+i).setAttribute('disabled', true);
        // document.getElementById('sistema'+i).readOnly = true;
        $('#tipom'+vinculada).val(document.getElementById("tipom"+i).value);
        document.getElementById('tipom'+vinculada).setAttribute('disabled', true);
        // document.getElementById('tipom'+vinculada).readOnly = true;
        document.getElementById('tipom'+i).setAttribute('disabled', true);
        // document.getElementById('tipom'+i).readOnly = true;
        $('#mmotor'+vinculada).val(document.getElementById("mmotor"+i).value);
        document.getElementById('mmotor'+vinculada).setAttribute('disabled', true);
        // document.getElementById('mmotor'+vinculada).readOnly = true;
        document.getElementById('mmotor'+i).setAttribute('disabled', true);
        // document.getElementById('mmotor'+i).readOnly = true;
        $('#marco'+vinculada).val(document.getElementById("marco"+i).value);
        document.getElementById('marco'+vinculada).setAttribute('disabled', true);
        // document.getElementById('marco'+vinculada).readOnly = true;
        document.getElementById('marco'+i).setAttribute('disabled', true);
        // document.getElementById('marco'+i).readOnly = true;
        $('#lmotor'+vinculada).val(document.getElementById("lmotor"+i).value);
        document.getElementById('lmotor'+vinculada).setAttribute('disabled', true);
        // document.getElementById('lmotor'+vinculada).readOnly = true;
        document.getElementById('lmotor'+i).setAttribute('disabled', true);
        // document.getElementById('lmotor'+i).readOnly = true;
        $('#fijar'+vinculada).val(document.getElementById("fijar"+i).value);
        document.getElementById('fijar'+vinculada).setAttribute('disabled', true);
        // document.getElementById('fijar'+vinculada).readOnly = true;
        document.getElementById('fijar'+i).setAttribute('disabled', true);
        // document.getElementById('fijar'+i).readOnly = true;
        $('#vinculado'+vinculada).val(i);
        document.getElementById('vinculado'+vinculada).setAttribute('disabled', true);
        // document.getElementById('vinculado'+vinculada).readOnly = true;
        vincula_motor();
        cambiar_color(vinculada);
      }
      if(document.getElementById("mmotor"+i).value == '3 lienzos')
      {
        var vinculada=document.getElementById("vinculado"+i).value.split(",");
        options=document.getElementById("vinculado"+i).options[document.getElementById("vinculado"+i).selectedIndex];
        $('#vinculado'+i).empty();
        $('#vinculado'+i).append('<option id="ve" value=" ">---</option>');
        $('#vinculado'+i).append(options);
        $('#vinculado'+i).val(options.value);
        $('#sistema'+vinculada[0]).val(document.getElementById("sistema"+i).value);
        $('#sistema'+vinculada[1]).val(document.getElementById("sistema"+i).value);
        document.getElementById('sistema'+vinculada[0]).setAttribute('disabled', true);
        // document.getElementById('sistema'+vinculada[0]).readOnly = true;
        document.getElementById('sistema'+vinculada[1]).setAttribute('disabled', true);
        // document.getElementById('sistema'+vinculada[1]).readOnly = true;
        document.getElementById('sistema'+i).setAttribute('disabled', true);
        // document.getElementById('sistema'+i).readOnly = true;
        $('#tipom'+vinculada[0]).val(document.getElementById("tipom"+i).value);
        $('#tipom'+vinculada[1]).val(document.getElementById("tipom"+i).value);
        document.getElementById('tipom'+vinculada[0]).setAttribute('disabled', true);
        // document.getElementById('tipom'+vinculada[0]).readOnly = true;
        document.getElementById('tipom'+vinculada[1]).setAttribute('disabled', true);
        // document.getElementById('tipom'+vinculada[1]).readOnly = true;
        document.getElementById('tipom'+i).setAttribute('disabled', true);
        // document.getElementById('tipom'+i).readOnly = true;
        $('#mmotor'+vinculada[0]).val(document.getElementById("mmotor"+i).value);
        $('#mmotor'+vinculada[1]).val(document.getElementById("mmotor"+i).value);
        document.getElementById('mmotor'+vinculada[0]).setAttribute('disabled', true);
        // document.getElementById('mmotor'+vinculada[0]).readOnly = true;
        document.getElementById('mmotor'+vinculada[1]).setAttribute('disabled', true);
        // document.getElementById('mmotor'+vinculada[1]).readOnly = true;
        document.getElementById('mmotor'+i).setAttribute('disabled', true);
        // document.getElementById('mmotor'+i).readOnly = true;
        $('#marco'+vinculada[0]).val(document.getElementById("marco"+i).value);
        $('#marco'+vinculada[1]).val(document.getElementById("marco"+i).value);
        document.getElementById('marco'+vinculada[0]).setAttribute('disabled', true);
        // document.getElementById('marco'+vinculada[0]).readOnly = true;
        document.getElementById('marco'+vinculada[1]).setAttribute('disabled', true);
        // document.getElementById('marco'+vinculada[1]).readOnly = true;
        document.getElementById('marco'+i).setAttribute('disabled', true);
        // document.getElementById('marco'+i).readOnly = true;
        $('#lmotor'+vinculada[0]).val(document.getElementById("lmotor"+i).value);
        $('#lmotor'+vinculada[1]).val(document.getElementById("lmotor"+i).value);
        document.getElementById('lmotor'+vinculada[0]).setAttribute('disabled', true);
        // document.getElementById('lmotor'+vinculada[0]).readOnly = true;
        document.getElementById('lmotor'+vinculada[1]).setAttribute('disabled', true);
        // document.getElementById('lmotor'+vinculada[1]).readOnly = true;
        document.getElementById('lmotor'+i).setAttribute('disabled', true);
        // document.getElementById('lmotor'+i).readOnly = true;
        $('#fijar'+vinculada[0]).val(document.getElementById("fijar"+i).value);
        $('#fijar'+vinculada[1]).val(document.getElementById("fijar"+i).value);
        document.getElementById('fijar'+vinculada[0]).setAttribute('disabled', true);
        // document.getElementById('fijar'+vinculada[0]).readOnly = true;
        document.getElementById('fijar'+vinculada[1]).setAttribute('disabled', true);
        // document.getElementById('fijar'+vinculada[1]).readOnly = true;
        document.getElementById('fijar'+i).setAttribute('disabled', true);
        // document.getElementById('fijar'+i).readOnly = true;
        if(i > vinculada[1])
        {
            $('#vinculado'+vinculada[0]).val(vinculada[1]+','+i);
        }
        else
        {
            $('#vinculado'+vinculada[0]).val(i+','+vinculada[1]);
        }
        if(i > vinculada[0])
        {
            $('#vinculado'+vinculada[1]).val(vinculada[0]+','+i);
        }
        else
        {
            $('#vinculado'+vinculada[1]).val(i+','+vinculada[0]);
        }
        // $('#vinculado'+vinculada[0]).val(i+','+vinculada[1]);
        // $('#vinculado'+vinculada[1]).val(i+','+vinculada[0]);
        // console.log(i+','+vinculada[1]);
        // console.log(i+','+vinculada[0]);
        document.getElementById('vinculado'+vinculada[0]).setAttribute('disabled', true);
        // document.getElementById('vinculado'+vinculada[0]).readOnly = true;
        document.getElementById('vinculado'+vinculada[1]).setAttribute('disabled', true);
        // document.getElementById('vinculado'+vinculada[1]).readOnly = true;
        vincula_motor();
        cambiar_color(vinculada[0]);
        cambiar_color(vinculada[1]);
      }
    }
    else
    {
      if(document.getElementById("mmotor"+i).value == '2 lienzos')
      {
        document.getElementById('sistema'+i).removeAttribute('disabled');
        // document.getElementById('sistema'+i).readOnly = false;
        document.getElementById('tipom'+i).removeAttribute('disabled');
        // document.getElementById('tipom'+i).readOnly = false;
        document.getElementById('mmotor'+i).removeAttribute('disabled');
        // document.getElementById('mmotor'+i).readOnly = false;
        document.getElementById('fijar'+i).removeAttribute('disabled');
        // document.getElementById('fijar'+i).readOnly = false;
        document.getElementById('marco'+i).removeAttribute('disabled');
        // document.getElementById('marco'+i).readOnly = false;
        document.getElementById('lmotor'+i).removeAttribute('disabled');
        // document.getElementById('lmotor'+i).readOnly = false;
        document.getElementById('vinculado'+i).removeAttribute('disabled');
        // document.getElementById('vinculado'+i).readOnly = false;
        for(var j=0;j<total;j++)
        {
          if(document.getElementById("vinculado"+j).value != '' && document.getElementById("vinculado"+j).value != ' ' && document.getElementById("vinculado"+j).value == i)
          {
            document.getElementById('sistema'+j).removeAttribute('disabled');
            // document.getElementById('sistema'+j).readOnly = false;
            document.getElementById('tipom'+j).removeAttribute('disabled');
            // document.getElementById('tipom'+j).readOnly = false;
            document.getElementById('mmotor'+j).removeAttribute('disabled');
            // document.getElementById('mmotor'+j).readOnly = false;
            document.getElementById('fijar'+j).removeAttribute('disabled');
            // document.getElementById('fijar'+j).readOnly = false;
            document.getElementById('marco'+j).removeAttribute('disabled');
            // document.getElementById('marco'+j).readOnly = false;
            document.getElementById('lmotor'+j).removeAttribute('disabled');
            // document.getElementById('lmotor'+j).readOnly = false;
            document.getElementById('vinculado'+j).removeAttribute('disabled');
            // document.getElementById('vinculado'+j).readOnly = false;
            $('#vinculado'+j).val(' ');
            vincula_motor();
            cambiar_color(j);
          }
        }
      }
      if(document.getElementById("mmotor"+i).value == '3 lienzos')
      {
        document.getElementById('sistema'+i).removeAttribute('disabled');
        // document.getElementById('sistema'+i).readOnly = false;
        document.getElementById('tipom'+i).removeAttribute('disabled');
        // document.getElementById('tipom'+i).readOnly = false;
        document.getElementById('mmotor'+i).removeAttribute('disabled');
        // document.getElementById('mmotor'+i).readOnly = false;
        document.getElementById('fijar'+i).removeAttribute('disabled');
        // document.getElementById('fijar'+i).readOnly = false;
        document.getElementById('marco'+i).removeAttribute('disabled');
        // document.getElementById('marco'+i).readOnly = false;
        document.getElementById('lmotor'+i).removeAttribute('disabled');
        // document.getElementById('lmotor'+i).readOnly = false;
        document.getElementById('vinculado'+i).removeAttribute('disabled');
        // document.getElementById('vinculado'+i).readOnly = false;
        for(var j=0;j<total;j++)
        {
          if(document.getElementById("vinculado"+j).value != '' && document.getElementById("vinculado"+j).value != ' ' && document.getElementById("vinculado"+j).value.search(i) != -1)
          {
            document.getElementById('sistema'+j).removeAttribute('disabled');
            // document.getElementById('sistema'+j).readOnly = false;
            document.getElementById('tipom'+j).removeAttribute('disabled');
            // document.getElementById('tipom'+j).readOnly = false;
            document.getElementById('mmotor'+j).removeAttribute('disabled');
            // document.getElementById('mmotor'+j).readOnly = false;
            document.getElementById('fijar'+j).removeAttribute('disabled');
            // document.getElementById('fijar'+j).readOnly = false;
            document.getElementById('marco'+j).removeAttribute('disabled');
            // document.getElementById('marco'+j).readOnly = false;
            document.getElementById('lmotor'+j).removeAttribute('disabled');
            // document.getElementById('lmotor'+j).readOnly = false;
            document.getElementById('vinculado'+j).removeAttribute('disabled');
            // document.getElementById('vinculado'+j).readOnly = false;
            $('#vinculado'+j).val(' ');
            vincula_motor();
            cambiar_color(j);
          }
        }
      }
    }
  }
}

function listo()
{
  var total=$('#noper').val();
  var flag=true;
  for(var i=0;i<total;i++)
  {
    if($('#chequear'+i).css('color') == 'rgb(0, 0, 0)' || $('#chequear'+i).css('color') == 'rgb(255, 0, 0)')
    {
      flag=false;
    }
  }
  if($('#fecha_pedido').val() == '' || $('#fecha_pedido').val() == ' ' || $('#fecha_pedido').val() == null)
  {
    flag=false;
  }
  if(flag == true)
  {
    $('#subir').show();
    $('#nuevas').show();
    $('#mismas').show();
  }
  else
  {
    $('#subir').hide();
    $('#nuevas').hide();
    $('#mismas').hide();
  }
}

function cambiar_color(i)
{
  var x = document.getElementById("sistema"+i).value;
  if(x == 'manual')
  {
    var errores='';
    var flag=false;
    if($('#ancho'+i).val() == '' || $('#ancho'+i).val() == ' ')
    {
      flag=true;
      errores+='- Ingresa el ancho de la persiana.<br>';
    }
    else if($('#ancho'+i).val() > ancho_max)
    {
      flag=true;
      errores+='- El ancho excede el maximo permitido.<br>';
    }
    if($('#alto'+i).val() == '' || $('#alto'+i).val() == ' ')
    {
      flag=true;
      errores+='- Ingresa el alto de la persiana.<br>';
    }
    if(document.getElementById("sistema"+i).value == ' ')
    {
      flag=true;
    }
    if(document.getElementById("lado"+i).value == ' ')
    {
      flag=true;
      errores+='- Ingresa el lado del control.<br>';
    }
    if($('#acont'+i).val() == '' || $('#acont'+i).val() == ' ')
    {
      flag=true;
      errores+='- Ingresa el alto del control.<br>';
    }
    if(document.getElementById("fijar"+i).value == ' ')
    {
      flag=true;
    }
    if(document.getElementById("marco"+i).value == ' ')
    {
      flag=true;
    }
    if(document.getElementById("soporte"+i).value == ' ')
    {
      flag=true;
      errores+='- Ingresa el tipo de soporte.<br>';
    }
    else if(document.getElementById("soporte"+i).value == 2)
    {
      if(document.getElementById("pos"+i).value == ' ')
      {
        flag=true;
        errores+='- Indica la posicion del soporte.<br>';
      }
    }
    if(document.getElementById("soporte"+i).value == '2' && (!$.trim($('#vinculado'+i).html()) || document.getElementById("vinculado"+i).value == ' '))
    {
      flag=true;
      errores+='- La persiana debe estar vinculada.<br>';
    }
    if(flag == false)
    {
      $('#chequear'+i).css('color','green');
      $('#boton_er'+i).attr('data-original-title',errores);
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
      listo();
    }
    if(flag == true)
    {
      console.log(errores);
      $('#chequear'+i).css('color','red');
    //  $('#boton_er'+i).attr('title', errores);
      $('#boton_er'+i).attr('data-original-title',errores);
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
      listo();
    }
  }
  if(x == 'motorizada')
  {
    var errores='';
    var flag=false;
    if($('#ancho'+i).val() == '' || $('#ancho'+i).val() == ' ')
    {
      flag=true;
      errores+='- Ingresa el ancho de la persiana.<br>';
    }
    else if($('#ancho'+i).val() > ancho_max)
    {
      flag=true;
      errores+='- El ancho excede el maximo permitido.<br>';
    }
    if($('#alto'+i).val() == '' || $('#alto'+i).val() == ' ')
    {
      flag=true;
      errores+='- Ingresa el alto de la persiana.<br>';
    }
    if(document.getElementById("tipom"+i).value == ' ')
    {
      flag=true;
      errores+='- Ingresa el tipo de motor.<br>';
    }
    if(document.getElementById("mmotor"+i).value == ' ')
    {
      flag=true;
      errores+='- Ingresa el modelo del motor.<br>';
    }
    if(document.getElementById("lmotor"+i).value == ' ')
    {
      flag=true;
      errores+='- Ingresa el lado del motor.<br>';
    }
    if(document.getElementById("fijar"+i).value == ' ')
    {
      flag=true;
    }
    if(document.getElementById("marco"+i).value == ' ')
    {
      flag=true;
    }
    if(document.getElementById("mmotor"+i).value == '2 lienzos' && (!$.trim($('#vinculado'+i).html()) || document.getElementById("vinculado"+i).value == ' '))
    {
      flag=true;
      errores+='- La persiana debe estar vinculada.<br>';
    }
    if(document.getElementById("mmotor"+i).value == '3 lienzos' && (!$.trim($('#vinculado'+i).html()) || document.getElementById("vinculado"+i).value == ' '))
    {
      flag=true;
      errores+='- La persiana debe estar vinculada.<br>';
    }
    if(flag == false)
    {
      $('#chequear'+i).css('color','green');
      $('#boton_er'+i).attr('data-original-title',errores);
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
      listo();
    }
    if(flag == true)
    {
      $('#chequear'+i).css('color','red');
      //$('#boton_er'+i).attr('title', errores);
      $('#boton_er'+i).attr('data-original-title',errores);
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
      listo();
    }
  }
}

function cambia_tipo()
{
  if(!$.trim($('#persianas').html()))
  {
      console.log("hola");
  }
  else
  {
    cuantas();
  }
}

function apen(i)
{
  $('#persianas').append('<div id="pers'+i+'" class="row"><div class="col-sm-12"><div class="form-group col-sm-1"><label class="control-label">'+(i+1)+'</label></div><div class="form-group col-sm-1"><label for="ancho'+i+'" class="control-label">Ancho:</label><div><input class="form-control" name="ancho'+i+'" type="text" id="ancho'+i+'" onfocusout="cambiar_color('+i+')" data-toggle="tooltip" data-placement="bottom" title="Ancho maximo: "></div></div><div class="form-group col-sm-1"><label for="alto'+i+'" class="control-label">Alto:</label><div><input class="form-control" name="alto'+i+'" type="text" id="alto'+i+'" onkeypress="calcular('+i+')" onchange="calcular('+i+')" onfocusout="cambiar_color('+i+')"></div></div><div class="form-group col-sm-1"><label for="sistema'+i+'" class="control-label">Sistema:</label><div class=""><select class="form-control" name="sistema'+i+'" id="sistema'+i+'" onchange="sistema('+i+')" onfocusout="cambiar_color('+i+')"><option value="manual">Manual</option></select></div></div><div class="form-group col-sm-1" id="dtipom'+i+'"><label for="tipom'+i+'" class="control-label">Tipo Motor:</label><div class=""><select class="form-control" name="tipo_motor'+i+'" id="tipom'+i+'" onfocusout="cambiar_color('+i+')"><option value=" ">---</option><option value="fuci">Fuci</option><option value="zomfy">Zomfy</option></select></div></div><div class="form-group col-sm-1" id="dmmotor'+i+'"><label for="mmotor'+i+'" class="control-label">Modelo Motor:</label><div class=""><select class="form-control" name="motor'+i+'" id="mmotor'+i+'" onfocusout="cambiar_color('+i+')" onchange="cambiar_motor('+i+')"><option value=" ">---</option><option value="1 lienzo">1 lienzo</option><option value="2 lienzos">2 lienzos</option><option value="3 lienzos">3 lienzos</option></select></div></div><div class="form-group col-sm-1" id="dlmotor'+i+'"><label for="lmotor'+i+'" class="control-label">Lado Motor:</label><div class=""><select class="form-control" name="lado_motor'+i+'" id="lmotor'+i+'" onfocusout="cambiar_color('+i+')"><option value=" ">---</option><option value="izquierdo">Izquierdo</option><option value="derecho">Derecho</option></select></div></div><div class="form-group col-sm-1" id="dlado'+i+'"><label for="lado'+i+'" class="control-label">Lado control:</label><select class="form-control" name="control_p'+i+'" id="lado'+i+'" onfocusout="cambiar_color('+i+')"><option value=" ">---</option><option value="izquierdo">Izquierdo</option><option value="derecho">Derecho</option></select></div><div class="form-group col-sm-1" id="dacont'+i+'"><label for="acont'+i+'" class="control-label">Altura control:</label><div><input class="form-control" name="altura_control'+i+'" type="text" id="acont'+i+'" onfocusout="cambiar_color('+i+')"></div></div><div class="form-group col-sm-1"><label for="fijar'+i+'" class="control-label">Fijar a:</label><div><select class="form-control" name="soporte_u'+i+'" id="fijar'+i+'" onfocusout="cambiar_color('+i+')"><option value="techo">Techo</option><option value="muro">Muro</option></select></div></div><div class="form-group col-sm-1"><label for="marco'+i+'" class="control-label">Marco:</label><div><select class="form-control" name="soporte_m'+i+'" id="marco'+i+'" onfocusout="cambiar_color('+i+')"><option value="dentro">DM</option><option value="fuera">FM</option></select></div></div><div id="sopor'+i+'" class="form-group col-sm-1"><label for="soporte'+i+'" class="control-label">Soporte:</label><div><select class="form-control" name="soporte'+i+'" id="soporte'+i+'" onchange="manuales('+i+')" onfocusout="cambiar_color('+i+')"><option value=" ">---</option><option value="1">Independiente</option><option value="2">Con Soporte</option></select></div></div><div id="poscic'+i+'" class="form-group col-sm-1"><label for="pos'+i+'" class="control-label">Posicion:</label><div><select class="form-control" name="soporte_p'+i+'" id="pos'+i+'" onfocusout="cambiar_color('+i+')"><option value=" ">---</option><option value="intermedio">Intermedio</option><option value="lateral">Lateral</option></select></div></div><div id="vincu'+i+'" class="form-group col-sm-1"><label for="vinculado'+i+'" class="control-label">Vinculado:</label><div><select class="form-control" name="vinculado'+i+'" id="vinculado'+i+'" onchange="checa_vin('+i+')" onfocusout="cambiar_color('+i+')"></select></div></div><div id="chequear'+i+'" class="col-sm-1 center-block" style="font-size:50px; color:black;"><i id="boton_er'+i+'" class="glyph-icon icon-check-circle" data-toggle="tooltip" data-html="true" data-placement="bottom" ></i></div></div></div>');
}

function apen_m(i)
{
  $('#persianas').append('<div id="pers'+i+'" class="row"><div class="col-sm-12"><div class="form-group col-sm-1"><label class="control-label">'+(i+1)+'</label></div><div class="form-group col-sm-1"><label for="ancho'+i+'" class="control-label">Ancho:</label><div><input class="form-control" name="ancho'+i+'" type="text" id="ancho'+i+'" onfocusout="cambiar_color('+i+')" data-toggle="tooltip" data-placement="bottom" title="Ancho maximo: "></div></div><div class="form-group col-sm-1"><label for="alto'+i+'" class="control-label">Alto:</label><div><input class="form-control" name="alto'+i+'" type="text" id="alto'+i+'" onkeypress="calcular('+i+')" onchange="calcular('+i+')" onfocusout="cambiar_color('+i+')"></div></div><div class="form-group col-sm-1"><label for="sistema'+i+'" class="control-label">Sistema:</label><div class=""><select class="form-control" name="sistema'+i+'" id="sistema'+i+'" onchange="sistema('+i+')" onfocusout="cambiar_color('+i+')"><option value="manual">Manual</option><option value="motorizada">Motorizada</option></select></div></div><div class="form-group col-sm-1" id="dtipom'+i+'"><label for="tipom'+i+'" class="control-label">Tipo Motor:</label><div class=""><select class="form-control" name="tipo_motor'+i+'" id="tipom'+i+'" onfocusout="cambiar_color('+i+')"><option value=" ">---</option><option value="fuci">Fuci</option><option value="zomfy">Zomfy</option></select></div></div><div class="form-group col-sm-1" id="dmmotor'+i+'"><label for="mmotor'+i+'" class="control-label">Modelo Motor:</label><div class=""><select class="form-control" name="motor'+i+'" id="mmotor'+i+'" onfocusout="cambiar_color('+i+')" onchange="cambiar_motor('+i+')"><option value=" ">---</option><option value="1 lienzo">1 lienzo</option><option value="2 lienzos">2 lienzos</option><option value="3 lienzos">3 lienzos</option></select></div></div><div class="form-group col-sm-1" id="dlmotor'+i+'"><label for="lmotor'+i+'" class="control-label">Lado Motor:</label><div class=""><select class="form-control" name="lado_motor'+i+'" id="lmotor'+i+'" onfocusout="cambiar_color('+i+')"><option value=" ">---</option><option value="izquierdo">Izquierdo</option><option value="derecho">Derecho</option></select></div></div><div class="form-group col-sm-1" id="dlado'+i+'"><label for="lado'+i+'" class="control-label">Lado control:</label><select class="form-control" name="control_p'+i+'" id="lado'+i+'" onfocusout="cambiar_color('+i+')"><option value=" ">---</option><option value="izquierdo">Izquierdo</option><option value="derecho">Derecho</option></select></div><div class="form-group col-sm-1" id="dacont'+i+'"><label for="acont'+i+'" class="control-label">Altura control:</label><div><input class="form-control" name="altura_control'+i+'" type="text" id="acont'+i+'" onfocusout="cambiar_color('+i+')"></div></div><div class="form-group col-sm-1"><label for="fijar'+i+'" class="control-label">Fijar a:</label><div><select class="form-control" name="soporte_u'+i+'" id="fijar'+i+'" onfocusout="cambiar_color('+i+')"><option value="techo">Techo</option><option value="muro">Muro</option></select></div></div><div class="form-group col-sm-1"><label for="marco'+i+'" class="control-label">Marco:</label><div><select class="form-control" name="soporte_m'+i+'" id="marco'+i+'" onfocusout="cambiar_color('+i+')"><option value="dentro">DM</option><option value="fuera">FM</option></select></div></div><div id="sopor'+i+'" class="form-group col-sm-1"><label for="soporte'+i+'" class="control-label">Soporte:</label><div><select class="form-control" name="soporte'+i+'" id="soporte'+i+'" onchange="manuales('+i+')" onfocusout="cambiar_color('+i+')"><option value=" ">---</option><option value="1">Independiente</option><option value="2">Con Soporte</option></select></div></div><div id="poscic'+i+'" class="form-group col-sm-1"><label for="pos'+i+'" class="control-label">Posicion:</label><div><select class="form-control" name="soporte_p'+i+'" id="pos'+i+'" onfocusout="cambiar_color('+i+')"><option value=" ">---</option><option value="intermedio">Intermedio</option><option value="lateral">Lateral</option></select></div></div><div id="vincu'+i+'" class="form-group col-sm-1"><label for="vinculado'+i+'" class="control-label">Vinculado:</label><div><select class="form-control" name="vinculado'+i+'" id="vinculado'+i+'" onchange="checa_vin('+i+')" onfocusout="cambiar_color('+i+')"></select></div></div><div id="chequear'+i+'" class="col-sm-1 center-block" style="font-size:50px; color:black;"><i id="boton_er'+i+'" class="glyph-icon icon-check-circle" data-toggle="tooltip" data-html="true" data-placement="bottom" ></i></div></div></div>');
}

function cuantas()
{
  //console.log($('#noper').val());
  var total=$('#noper').val();
  $('#persianas').empty();
  $('#divider1').show();
  $('#divider2').show();
  $('#divider3').show();
  $('#divider4').show();
  //var pers='<option id="ve" value="---">---</option>';
  // for(var i=1;i<=total;i++)
  // {
  //   pers+='<option id="ve'+i+'" value="'+(i-1)+'">P'+i+'</option>';
  // }
  //console.log(pers);
  var x = document.getElementById("tipo").value;
  for(var i=0;i<total;i++)
  {
    if(x == 'enrrollable' || x == 'sheer' || x == 'romana' || x == 'shangri-la')
    {
      apen_m(i);
    }
    else
    {
      apen(i);
    }
    $('#vincu'+i).hide();
    // $('#vinculado'+i).append(pers);
    // $('#vinculado'+i+' #ve'+(i+1)).hide();
    $('#poscic'+i).hide();
    if(i != total-1)
    {
      $('#persianas').append('<div class="col s12 divider" style="margin-top:10px; margin-bottom:10px; background:red;"></div>');
    }
    $('#dtipom'+i).hide();
    $('#dmmotor'+i).hide();
    $('#dlmotor'+i).hide();
  }
  if(mismas != undefined && mismas == 1)
  {
    //$('#noper').val(num_persianas);
    var medidas_coma = persianas_medidas.split(",");
    for(var i=0;i<total;i++)
    {
      if(i < num_persianas)
      {
        $('#ancho'+i).val(medidas_coma[i+i]);
        $('#alto'+i).val(medidas_coma[(i+i)+1]);
      }
    }
    for(var i=0;i<num_persianas;i++)
    {
      calcular(i);
    }
  }
  toolt();
  listo();
}
</script>
