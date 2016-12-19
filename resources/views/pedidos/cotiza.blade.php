@extends('vistas.panel')

@section('content')
<div id="para_impresion">

  <div class="col-sm-12">
      <div class="col-sm-6">
          <h3>Cotización Pedido No.</h3>
      </div>
      <div class="col-sm-6">
          <h3>{{$pedido->folio}}</h3>
      </div>
  </div>

  <div class="col-sm-12">
    <table id="datatable-responsive" class="table table-striped table-bordered responsive" cellspacing="0" width="100%" >
      <thead>
          <th>Cantidad</th>
          <th>Descripción</th>
          <th>Precio Unitario</th>
          <th>Sub Total</th>
          <th id="ancho">Ancho</th>
          <th id="alto">Alto</th>
          <th id="tot">Total (m<sup>2</sup>)</th>
      </thead>
      <tbody id="tabla_persianas">
      </tbody>
    </table>
    <div class="row" id="contenido">

    </div>
  </div>
<div class="row" id="con_sin">
  <div class="col-xs-2">
    <label class="checkbox-inline">
      <input type="checkbox" id="instalar" value="0" onchange="instalar()"> Instalaciones
    </label>
  </div>
</div>

<div class="row" style="margin-top:20px;" id="fechas">
  <!-- Fecha Pedido Field -->
  <div class="form-group col-sm-4" id="pedido">
      {!! Form::label('fecha_pedido', 'Fecha de Pedido:', ['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
      @if(isset($pedido) || $pedido->fecha_pedido == '' || $pedido->fecha_pedido == NULL)
          {!! Form::date('fecha_pedido', $pedido->fecha_pedido, ['class' => 'form-control', 'onchange' => 'calcula_fecha()']) !!}
      @else
          {!! Form::date('fecha_pedido', null, ['class' => 'form-control', 'disabled']) !!}
      @endif
      </div>
  </div>

  <!-- Fecha Entrega Field -->
  <div class="form-group col-sm-4" id="entrega">
      {!! Form::label('fecha_entrega', 'Fecha de Entrega:', ['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
      @if(!isset($pedido) || $pedido->fecha_entrega == '' || $pedido->fecha_entrega == NULL)
        {!! Form::date('fecha_entrega', null, ['class' => 'form-control','disabled']) !!}
      @else
      {!! Form::date('fecha_entrega', $pedido->fecha_entrega, ['class' => 'form-control','disabled']) !!}
      @endif
      </div>
  </div>

  <!-- Fecha Instalacion Field -->
  <div class="form-group col-sm-4" id="instalacion">
      {!! Form::label('fecha_instalacion', 'Fecha de Instalacion:', ['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
      @if(!isset($pedido) || $pedido->fecha_instalacion == '' || $pedido->fecha_instalacion == NULL || strtotime($pedido->fecha_instalacion) == strtotime("-0001-11-30 00:00:00"))
        {!! Form::date('fecha_instalacion', null, ['class' => 'form-control']) !!}
      @else
        {!! Form::date('fecha_instalacion', $pedido->fecha_instalacion, ['class' => 'form-control','disabled']) !!}
      @endif
      </div>
  </div>
</div>

<div class="row" style="margin-top:25px;">
  <div id="hecho" class="col-xs-12" style="margin-top:10px; padding: 10px; text-align:center;">
  </div>
  @if(($pedido->monto+ $pedido->total_pagos($pedido->id)) < $pedido->total)
  <div id="dinero" class="col-xs-12" style="margin-top:10px; text-align:center;">
    <label class="checkbox-inline">
      <input type="checkbox" id="monto_nuevo" value="0" onchange="nuevos()">Nuevo monto
    </label><br>
    <!-- <label id="lab" for="nuevo_monto">Nuevo monto</label> -->
    <input type="text" class="form-control" name="nuevo_monto" id="nuevo_monto" placeholder="Cantidad...">
    <a id="monto_envio" class="btn btn-default">Enviar</a>
  </div>
  @endif
  <div id="cotiz" class="col-sm-12" style="text-align:center;">
    <h5 id="sub">SubTotal&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    <h5 id="desc">Descuento&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    <h5 id="total">Total&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    <p style="font-size:10px;">* precios incluyen iva</p>
    <div class="row" id="pagos" style="margin-top:30px;">
      <div class="col-xs-12">
      <label for="tipos">Forma de pago</label>
      <select class="form-control" name="tipos" id="tipos" onchange="forma_pago()">
        <option value="0">---</option>
        <option value="credito">Tarjeta de Crédito</option>
        <option value="debito">Tarjeta de Débito</option>
        <option value="contado">Contado</option>
        <option value="transferencia">Transferencia</option>
        <option value="cheque">Cheque</option>
        <option id="3meses" value="credito3">Tarjeta de Crédito - 3 meses</option>
        <option id="6meses" value="credito6">Tarjeta de Crédito - 6 meses</option>
        <option id="12meses" value="credito12">Tarjeta de Crédito - 12 meses</option>
      </select>
      </div>
      <div class="col-xs-12" style="text-align:center;x">
      <label class="checkbox-inline">
        <input type="checkbox" id="meses_sin" onclick="sin_intereses()">Más
      </label>
      </div>
      <!-- <div id="credito" class="col-xs-6 col-md-offset-3">
        <label class="radio-inline">
          <input type="radio" id="" name="radio" value="3 meses">
          3 Meses
        </label>
        <label class="radio-inline">
          <input type="radio" id="" name="radio" value="6 meses">
          6 Meses
        </label>
        <label class="radio-inline">
          <input type="radio" id="" name="radio" value="12 meses">
          12 Meses
        </label>
      </div> -->
      <div id="contado" class="col-xs-6 col-md-offset-3" style="margin-top:30px;">
        <label for="anticipo">Anticipo</label>
        <input type="text" class="form-control" name="anticipo" id="anticipo" placeholder="Cantidad...">
      </div>
    </div>
    <div id="terminos" style="margin-top:50px; margin-bottom:-100px;">
      <label class="checkbox-inline">
        <input type="checkbox" id="condiciones" onchange="aceptar()"> Acepto términos y condiciones
      </label>
    </div>
  </div>
  <div class="row" style="margin-top: 150px;">
    <div class="col-sm-12" style="text-align:center;">
      <div id="firma_aca">

      </div>
    </div>
    @if(Auth::user()->tipo_usuario === 'administrador' && $responsable != null)
    <div id="responsable" class="col-xs-12" style="margin-top:10px;">
      <label for="nuevo_monto">Usuario responsable: {{ $responsable->name }}</label>
    </div>
    @endif
  </div>
</div>

</div>
<div class="bg-default text-center pad20A mrg25T" style="margin-top:50px !important;">
<div class="form-group col-sm-12">
    <a id="ver" class="btn btn-lg btn-default">Ver Medidas</a>
    <a id="cupon" class="btn btn-lg btn-default" data-toggle="modal" data-target="#modal_cupon">Usar Cupon</a>
    <a id="cotizacion" class="btn btn-lg btn-default">Guardar Cotizacion</a>
    <a id="imprimir" class="btn btn-lg btn-default">Imprimir</a>
    <a id="firmar" class="btn btn-lg btn-default" data-toggle="modal" data-target="#firmas">Firmar</a>
    <!-- <a id="vigencia" class="btn btn-lg btn-default">Vigencia</a> -->
</div>
</div>



{!! Form::model($pedido, ['route' => ['imagen.agregar'],'class' => 'form-horizontal bordered-row','id' => 'imagen_form']) !!}
{!! Form::close() !!}


<div class="modal fade" id="firmas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Firma</h4>
          </div>
          <div id="signature-pad" class="m-signature-pad">
            <div class="modal-body">
              <div class="m-signature-pad-body">
                <canvas></canvas>
                <div class="muestra" id="cont_imagen">
                  <img id="imagen_firma" src="" alt="" />
                </div>

              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default clear" data-action="clear">Limpiar</button>

              <button type="button" class="btn btn-default save" data-action="save">Capturar</button>
              <button id="guarda_firma" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_cupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Ingresa tu codigo</h4>
          </div>
          <div id="signature-pad" class="m-signature-pad">

            <div class="modal-body">
              <div class="m-signature-pad--body">
                <div class="row">
                        <div class="form-group col-sm-12">
                            {!! Form::label('codigo', 'Codigo:') !!}
                            {!! Form::number('text', null, ['class' => 'form-control', 'id' => 'codigo']) !!}
                        </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default clear" data-action="clear" data-dismiss="modal">cancelar  </button>
              <a type="button" class="btn btn-primary" data-dismiss="modal" id="usar">Usar Cupón en este pedido</a>
            </div>

          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Mensaje</h4>
          </div>
          <div id="signature-pad" class="m-signature-pad">
            <div class="modal-body">
              <div class="m-signature-pad--body">
                <div class="row">
                        <div class="form-group col-sm-12">
                            <h3 id="respuesta">Cupon no vàlido</h3>
                            <p>Por favor verifica que el numero de cupon sea el correcto</p>
                        </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<span id="loader"><p><img src="{{asset('images/svg-loaders/ball-triangle.svg')}}" alt="Cargando ..." /></p></span>

<script type="text/javascript" src="{{ asset('widgets/modal/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/resizable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/draggable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/sortable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/selectable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/dialog/dialog.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/dialog/dialog-demo.js') }}"></script>
<script src="{{ asset('widgets/signature_pad/signature_pad.js') }}"></script>
<script src="{{ asset('widgets/signature_pad/app.js') }}"></script>
<script>
  var id_user={!! Auth::user()->id !!};
  var pedido_s= {!! $pedido !!};
  var persianas = {!! $persianas !!};
  var imagenes = {!! $pedido->images !!};
  var fecha = "{!! $pedido->fecha_instalacion !!}";
  console.log(fecha);
  var precio=50;
  var pre="{!! $precios !!}";
  var precios_reales= pre.split(",");
  var id = {!! $pedido->id !!};
  // console.log('-->',pedido_s.total);
  var sub=0;
  var total_pedido=0;
  var total_insta=0;
  var manuales=0;
  var motores=0;
  var instala=0;
  var soportes_p=0;
  var tabla='';
  var bandera_dinero=false;
  var impresion;
  for(var f=0;f<persianas.length;f++)
  {
    if(persianas[f].motor == '')
    {
      manuales++;
    }
    else
    {
      motores++;
    }
    if(persianas[f].soporte_p == 'intermedio')
    {
      soportes_p++;
    }
    sub= sub + parseInt(precios_reales[f]);
    tabla+='<tr>';
    tabla+='<td>1</td>';
    tabla+='<td>'+persianas[f].tipo+' '+persianas[f].color+'</td>';
    tabla+='<td>$'+(precios_reales[f])+'</td>';
    tabla+='<td>$'+(precios_reales[f])+'</td>';
    tabla+='<td id="ancho'+f+'">'+persianas[f].ancho+'</td>';
    tabla+='<td id="alto'+f+'">'+persianas[f].alto+'</td>';
    tabla+='<td id="tot'+f+'">'+parseFloat(persianas[f].ancho * persianas[f].alto).toFixed(2)+'</td>';
    tabla+='</tr>';
  }
  instala = ((motores*200)+(manuales*100)+(soportes_p*100)+sub);
  sub=sub+(soportes_p*100);
  console.log(instala);
  if(motores != 0)
  {
    tabla+='<tr id="motores">';
    tabla+='<td>'+motores+'</td>';
    tabla+='<td>Instalacion de persiana motorizada</td>';
    tabla+='<td>$200</td>';
    tabla+='<td>$'+(motores*200)+'</td>';
    tabla+='<td id="ancho_motor">---</td>';
    tabla+='<td id="alto_motor">---</td>';
    tabla+='<td id="tot_motor">---</td>';
    tabla+='</tr>';
  }
  if(manuales != 0)
  {
    tabla+='<tr id="manuales">';
    tabla+='<td>'+manuales+'</td>';
    tabla+='<td>Instalacion de persiana manual</td>';
    tabla+='<td>$100</td>';
    tabla+='<td>$'+(manuales*100)+'</td>';
    tabla+='<td id="ancho_manual">---</td>';
    tabla+='<td id="alto_manual">---</td>';
    tabla+='<td id="tot_manual">---</td>';
    tabla+='</tr>';
  }
  if(soportes_p != 0)
  {
    tabla+='<tr id="sop">';
    tabla+='<td>'+soportes_p+'</td>';
    tabla+='<td>Soportes intermedios</td>';
    tabla+='<td>$100</td>';
    tabla+='<td>$'+(soportes_p*100)+'</td>';
    tabla+='<td id="sopan">---</td>';
    tabla+='<td id="sopal">---</td>';
    tabla+='<td id="soptot">---</td>';
    tabla+='</tr>';
  }
  $('#tabla_persianas').append(tabla);
  $('#alto').hide();
  $('#ancho').hide();
  $('#tot').hide();
  $('#alto_motor').hide();
  $('#ancho_motor').hide();
  $('#tot_motor').hide();
  $('#alto_manual').hide();
  $('#ancho_manual').hide();
  $('#tot_manual').hide();
  $('#sopan').hide();
  $('#sopal').hide();
  $('#soptot').hide();
  for(var f=0;f<persianas.length;f++)
  {
    $('#alto'+f).hide();
    $('#ancho'+f).hide();
    $('#tot'+f).hide();
  }

  if(pedido_s.cupons.length != 0)
  {
    console.log(pedido_s.cupons);
    $('#cupon').hide();
    $('#sub').append('$'+sub);
    if(pedido_s.cupons[0].descuento != 0)
    {
        $('#desc').append('$ '+pedido_s.cupons[0].descuento+' pesos');
        total_pedido=(sub-pedido_s.cupons[0].descuento);
        $('#total').append('$ '+total_pedido);
        total_insta=(instala-pedido_s.cupons[0].descuento);
    }
    else
    {
      $('#desc').append(''+pedido_s.cupons[0].porcentaje+'%');
      total_pedido=(sub-((sub*pedido_s.cupons[0].porcentaje)/100));
      $('#total').append('$'+total_pedido);
      total_insta=(instala-((instala*pedido_s.cupons[0].porcentaje)/100));
    }
  }
  else
  {
    $('#sub').append('$'+sub);
    $('#desc').append('0%');
    total_pedido=sub;
    total_insta=instala;
    $('#total').append('$'+total_pedido);
  }
  // $('#sub').append('$'+sub);
  // $('#total').append('$'+(sub-((sub*10)/100)));

  $('#ver').click(function()
  {
    $('#alto').show();
    $('#ancho').show();
    $('#tot').show();
    $('#alto_motor').show();
    $('#ancho_motor').show();
    $('#tot_motor').show();
    $('#alto_manual').show();
    $('#ancho_manual').show();
    $('#tot_manual').show();
    $('#sopan').show();
    $('#sopal').show();
    $('#soptot').show();
    for(var f=0;f<persianas.length;f++)
    {
      $('#alto'+f).show();
      $('#ancho'+f).show();
      $('#tot'+f).show();
    }
  });

  $('#cotizacion').click(function()
  {
    $('#loader').show();
    window.location.href="{!! route('pedidos.index') !!}";
  });

  $('#monto_envio').click(function()
  {
    $('#loader').show();
    var y =$('#nuevo_monto').val();
    console.log(y);
    var url = "http://localhost:8000/monto_pedidos/"+id+','+y+','+id_user;
    $.ajax({url: url , success: function(result){
        $('#loader').delay(500).fadeOut("slow");
        if(result != null)
        {
          if(pedido_s.instalacion != 0)
          {
              $('#hecho').html('<h5>Con instalaciones</h5><h5>Tipo de pago: '+pedido_s.tipo_pago+'</h5><h5>Monto: $'+result+'</h5><h5>Total firmado: $'+pedido_s.total+'</h5>');
          }
          else
          {
              $('#hecho').html('<h5>Tipo de pago: '+pedido_s.tipo_pago+'</h5><h5>Monto: $'+result+'</h5><h5>Total firmado: $'+pedido_s.total+'</h5>');
          }
          $('#dinero').hide();
          bandera_dinero=true;
        }
    }});
  });

  $('#guarda_firma').click(function()
  {
    $('#loader').show();
    var yy=document.getElementById("tipos").value;
    var x=document.getElementById("instalar").checked;
    //console.log(document.getElementById("cont_imagen").children[0].src);
    var contenido=document.getElementById("cont_imagen").children[0].src;
    var firm= document.getElementById("cont_imagen").children[0];
    $('#firma_aca').html(firm);
    var form = document.getElementById('imagen_form');
    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "contenido");
    hiddenField.setAttribute("value", contenido);
    form.appendChild(hiddenField);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "pedido_id");
    hiddenField.setAttribute("value", id);
    form.appendChild(hiddenField);

    var y=document.getElementById("instalar").checked;
    if(y)
    {
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "instalacion");
      hiddenField.setAttribute("value", y);
      form.appendChild(hiddenField);
    }


    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "imprime");
    hiddenField.setAttribute("value", impresion);
    form.appendChild(hiddenField);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "user_id");
    hiddenField.setAttribute("value", id_user);
    form.appendChild(hiddenField);

    var f=$('#fecha_instalacion').val();
    if(f != '')
    {
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "fecha_instalacion");
      hiddenField.setAttribute("value", f);
      form.appendChild(hiddenField);
    }

    var g=$('#fecha_pedido').val();
    if(g != '')
    {
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "fecha_pedido");
      hiddenField.setAttribute("value", g);
      form.appendChild(hiddenField);
    }

    var t=$('#fecha_entrega').val();
    if(t != '')
    {
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "fecha_entrega");
      hiddenField.setAttribute("value", t);
      form.appendChild(hiddenField);
    }

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "total");
    if(x)
    {
      hiddenField.setAttribute("value", total_insta);
    }
    else
    {
        hiddenField.setAttribute("value", total_pedido);
    }

    form.appendChild(hiddenField);

    if(yy == "credito3" || yy == "credito6" || yy == "credito12")
    {
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "tipo_pago");
      hiddenField.setAttribute("value", "credito");
      form.appendChild(hiddenField);

      if(yy == "credito3")
      {
        var z=$('#anticipo').val();
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "monto");
        hiddenField.setAttribute("value", "3 meses");
        form.appendChild(hiddenField);
      }
      if(yy == "credito12")
      {
        var z=$('#anticipo').val();
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "monto");
        hiddenField.setAttribute("value", "12 meses");
        form.appendChild(hiddenField);
      }
      if(yy == "credito6")
      {
        var z=$('#anticipo').val();
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "monto");
        hiddenField.setAttribute("value", "6 meses");
        form.appendChild(hiddenField);
      }
    }
    else
    {
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "tipo_pago");
      hiddenField.setAttribute("value", yy);
      form.appendChild(hiddenField);

      var z=$('#anticipo').val();
      var hiddenField = document.createElement("input");
      hiddenField.setAttribute("type", "hidden");
      hiddenField.setAttribute("name", "monto");
      hiddenField.setAttribute("value", z);
      form.appendChild(hiddenField);
    }

    // if(yy == "credito")
    // {
    //   var z=$('input[name="radio"]:checked').val();
    //   var hiddenField = document.createElement("input");
    //   hiddenField.setAttribute("type", "hidden");
    //   hiddenField.setAttribute("name", "monto");
    //   hiddenField.setAttribute("value", z);
    //   form.appendChild(hiddenField);
    // }
    // if(yy == "contado")
    // {
    //   var z=$('#anticipo').val();
    //   var hiddenField = document.createElement("input");
    //   hiddenField.setAttribute("type", "hidden");
    //   hiddenField.setAttribute("name", "monto");
    //   hiddenField.setAttribute("value", z);
    //   form.appendChild(hiddenField);
    // }

    form.submit();
  });

  function aceptar()
  {
    ya_firma();
    // if(document.getElementById("condiciones").checked)
    // {
    //   $('#firmar').show();
    // }
    // else
    // {
    //   $('#firmar').hide();
    // }
  }

  function sin_intereses()
  {
    var y=document.getElementById("meses_sin").checked;
    console.log(y);
    if(y)
    {
      $('#3meses').show();
      $('#6meses').show();
      $('#12meses').show();
    }
    else
    {
      $('#3meses').hide();
      $('#6meses').hide();
      $('#12meses').hide();
    }
  }

  function forma_pago()
  {
    var y=document.getElementById("tipos").value;
    console.log(y);
    // if(y == 'credito')
    // {
    //   $('#credito').show();
    //   $('#contado').hide();
    // }
    // else if(y == 'contado')
    // {
    //   $('#contado').show();
    //   $('#credito').hide();
    // }
    // else
    // {
    //   $('#contado').hide();
    //   $('#credito').hide();
    // }
    if(y == 'credito3' || y == 'credito6' || y == 'credito12' || y == 0)
    {
      $('#contado').hide();
    }
    else
    {
      $('#contado').show();
    }
  }

  function calcula_fecha()
  {
    $('#fecha_entrega').val('')
    $('#fecha_instalacion').val('')
    var x=$('#fecha_pedido').val();
    console.log(x);
    var hoy= new Date(x);
    i=0;
    while (i<=6)
    {
      hoy.setTime(hoy.getTime()+24*60*60*1000);
      if (hoy.getDay() != 6 && hoy.getDay() != 0)
        i++;
    }
    if(hoy.getDate() <= 9)
    {
      fecha = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+'0'+hoy.getDate();
    }
    else
    {
      fecha = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
    }
    console.log(hoy.getDate());
    console.log($('#fecha_instalacion').val()=='');
    $('#fecha_entrega').val(fecha);
    document.getElementById("fecha_instalacion").setAttribute("min", fecha);
    ya_firma();
  }

  function ya_firma()
  {
    if($('#fecha_pedido').val() != '' && document.getElementById("condiciones").checked)
    {
      $('#firmar').show();
    }
    else
    {
      $('#firmar').hide();
    }
  }

  function nuevos()
  {
    var y=document.getElementById("monto_nuevo").checked;
    if(y)
    {
      $('#nuevo_monto').show();
      $('#lab').show();
      $('#monto_envio').show();
    }
    else
    {
      $('#nuevo_monto').hide();
      $('#lab').hide();
      $('#monto_envio').hide();
    }
  }

  function instalar()
  {
    var y=document.getElementById("instalar").checked;
    console.log(y);
    if(y)
    {
      $('#motores').show();
      $('#manuales').show();
      $('#total').html('Total&nbsp;&nbsp;&nbsp;&nbsp;$'+total_insta);
      $('#sub').html('SubTotal&nbsp;&nbsp;&nbsp;&nbsp;$'+instala);
    }
    else
    {
      $('#motores').hide();
      $('#manuales').hide();
      $('#total').html('Total&nbsp;&nbsp;&nbsp;&nbsp;$'+total_pedido);
      $('#sub').html('SubTotal&nbsp;&nbsp;&nbsp;&nbsp;$'+sub);
    }
  }


  $(document).ready(function()
  {
    var texto;
    var mont;
    $('#nuevo_monto').hide();
    $('#3meses').hide();
    $('#6meses').hide();
    $('#12meses').hide();
    $('#lab').hide();
    $('#motores').hide();
    $('#manuales').hide();
    $('#loader').hide();
    $('#firmar').hide();
    $('#credito').hide();
    $('#contado').hide();
    $('#dinero').hide();
    $('#hecho').hide();
    $('#monto_envio').hide();
    if(imagenes[0] != undefined)
    {
      console.log("->>",pedido_s);
      $('#firma_aca').html('<img src="http://localhost:8000/'+imagenes[0].contenido.slice(51)+'" alt="Firma...">');
      $('#firmar').hide();
      $('#cotizacion').hide();
      $('#cupon').hide();
      $('#terminos').hide();
      $('#credito').hide();
      $('#contado').hide();
      $('#pagos').hide();
      $('#cotiz').hide();
      // $('#con_sin').hide();
      // $('#sub').hide();
      // $('#desc').hide();
      $('#instalacion').hide();
      $('#pedido').hide();
      $('#entrega').hide();
      $('#total').html('Total&nbsp;&nbsp;&nbsp;&nbsp;$'+pedido_s.total);
      $('#hecho').show();
      // if(pedido_s.tipo_pago == 'credito')
      // {
      //   texto='Tarjeta de credito';
      //   mont=pedido_s.monto;
      // }
      // else if(pedido_s.tipo_pago == 'debito')
      // {
      //   texto='Tarjeta de Debito';
      //   mont=pedido_s.monto;
      // }
      // else
      // {
      //   texto=pedido_s.tipo_pago;
      //   mont='$'+pedido_s.monto;
      // }

      if(pedido_s.tipo_pago == 'credito')
      {
        if(pedido_s.monto != "3 meses" && pedido_s.monto != "6 meses" && pedido_s.monto != "12 meses")
        {
          texto="Tarjeta de Credito";
          mont='$'+pedido_s.monto;
        }
        else
        {
          texto='Tarjeta de credito';
          mont=pedido_s.monto;
        }
      }
      else
      {
        if(pedido_s.tipo_pago == 'debito')
        {
          texto="Tarjeta de Debito";
        }
        else
        {
          texto=pedido_s.tipo_pago;
        }
        mont='$'+pedido_s.monto;
      }

      if(pedido_s.monto != null)
      {
        if(pedido_s.instalacion != 0)
        {
            $('#hecho').html('<h5>Con instalaciones</h5><h5>Tipo de pago: '+texto+'</h5><h5>Monto: '+mont+'</h5><h5>Total firmado: $'+pedido_s.total+'</h5>');
        }
        else
        {
            $('#hecho').html('<h5>Tipo de pago: '+texto+'</h5><h5>Monto: '+mont+'</h5><h5>Total firmado: $'+pedido_s.total+'</h5>');
        }
        // $('#hecho').html('<h5>Tipo de pago: '+pedido_s.tipo_pago+'</h5><h5>Monto: $'+pedido_s.monto+'</h5><h5>Total firmado: $'+pedido_s.total+'</h5>');
      }
      else
      {
        if(pedido_s.instalacion != 0)
        {
            $('#hecho').html('<h5>Con instalaciones</h5><h5>Tipo de pago: '+texto+'</h5><h5>Total firmado: $'+pedido_s.total+'</h5>');
        }
        else
        {
            $('#hecho').html('<h5>Tipo de pago: '+texto+'</h5><h5>Total firmado: $'+pedido_s.total+'</h5>');
        }
      }
      if(pedido_s.fecha_instalacion == '-0001-11-30 00:00:00')
      {
        $('#fechas').html('<div class="form-group col-sm-6" style="text-align:center;"><h5>Fecha de Pedido: '+pedido_s.fecha_pedido.split(" ")[0]+'</h5></div><div class="form-group col-sm-6" style="text-align:center;"><h5>Fecha de Entrega: '+pedido_s.fecha_entrega.split(" ")[0]+'</h5></div>');
      }
      else
      {
        $('#fechas').html('<div class="form-group col-sm-4" style="text-align:center;"><h5>Fecha de Pedido: '+pedido_s.fecha_pedido.split(" ")[0]+'</h5></div><div class="form-group col-sm-4" style="text-align:center;"><h5>Fecha de Entrega: '+pedido_s.fecha_entrega.split(" ")[0]+'</h5></div><div class="form-group col-sm-4" style="text-align:center;"><h5>Fecha de Instalacion: '+pedido_s.fecha_instalacion.split(" ")[0]+'</h5></div>');
      }
      // console.log(pedido_s.tipo_pago == 'contado',pedido_s.monto < pedido_s.total,pedido_s.monto);
      if(pedido_s.monto != '3 meses' && pedido_s.monto != '6 meses' && pedido_s.monto != '12 meses' && parseInt(pedido_s.monto) < pedido_s.total)
      {
        $('#dinero').show();
      }
    }
  });

</script>

<script type="text/javascript">
    $(function () {
        $("#imprimir").click(function () {
            $("#dinero").hide();
            $("#responsable").hide();
            $("#datatable-responsive_length").hide();
            $("#datatable-responsive_filter").hide();
            $("#datatable-responsive_paginate").hide();
            $("#pedido").hide();
            $("#entrega").hide();
            $("#instalacion").hide();
            $("#terminos").hide();
            $("#pagos").hide();
            var contents = $("#para_impresion").html();
            impresion= contents;
            // console.log(pedido_s.monto, parseInt(pedido_s.monto) < pedido_s.total);
            if(pedido_s.monto != '3 meses' && pedido_s.monto != '6 meses' && pedido_s.monto != '12 meses' && parseInt(pedido_s.monto) < pedido_s.total && bandera_dinero == false)
            {
              $('#dinero').show();
            }
            $("#responsable").show();
            var frame1 = $('<iframe />');
            frame1[0].name = "frame1";
            frame1.css({ "position": "absolute", "top": "-1000000px" });
            $("body").append(frame1);
            var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
            frameDoc.document.open();
            //Create a new HTML document.
            frameDoc.document.write('<html><head><title>Cotización</title>');
            frameDoc.document.write('</head><body>');
            //Append the external CSS file.
            frameDoc.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">');
            //Append the DIV contents.
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            $("#datatable-responsive_length").show();
            $("#datatable-responsive_filter").show();
            $("#datatable-responsive_paginate").show();
            if(pedido_s.estado == 'cotizacion')
            {
              $("#pedido").show();
              $("#entrega").show();
              $("#instalacion").show();
              $("#pagos").show();
              $("#terminos").show();
            }
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                frame1.remove();
            }, 500);
        });
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    var resultado;
    console.log(id);
    $("#usar").click(function(){
      var url = "http://localhost:8000/usar/" + $('#codigo').val()+','+id;
      $('#loader').show();
       $.ajax({url: url , success: function(result){
           $('#loader').delay(500).fadeOut("slow");
           if(result != ''){
              //setTimeout(respuesta, 1000);
              // console.log(result);
              var y=document.getElementById("instalar").checked;
              if(result.descuento != 0)
              {
                  $('#desc').html('Descuento&nbsp;&nbsp;&nbsp;&nbsp;$ '+result.descuento+' pesos');
                  total_pedido=(sub-result.descuento);
                  total_insta=(instala-result.descuento);
                  if(!y)
                  {
                      $('#total').html('Total&nbsp;&nbsp;&nbsp;&nbsp;$'+total_pedido);
                  }
                  else
                  {
                    $('#total').html('Total&nbsp;&nbsp;&nbsp;&nbsp;$'+total_insta);
                  }
              }
              else
              {
                $('#desc').html('Descuento&nbsp;&nbsp;&nbsp;&nbsp;'+result.porcentaje+'%');
                total_pedido=(sub-((sub*result.porcentaje)/100));
                total_insta=(instala-((instala*result.porcentaje)/100));
                if(!y)
                {
                    $('#total').html('Total&nbsp;&nbsp;&nbsp;&nbsp;$'+total_pedido);
                }
                else
                {
                  $('#total').html('Total&nbsp;&nbsp;&nbsp;&nbsp;$'+total_insta);
                }
              }
              //$('#respuesta').html('El codigo es correcto');
              $('#cupon').hide();
           }
           else
           {
             console.log('error');
             $('#loader').delay(500).fadeOut("slow");
             $('#myModal2').modal()
              //$('#respuesta').html('El codigo no fue encontrado');
           }
       }});

    });

    function respuesta(){
      $('#boton3').click();
    }
  })
</script>

@endsection
