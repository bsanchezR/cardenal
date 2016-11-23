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
    <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%" >
      <thead>
          <th>Cantidad</th>
          <th>Descripción</th>
          <th>Precio Unitario</th>
          <th>Sub Total</th>
          <th class="hidden" id="alto">Alto</th>
          <th class="hidden" id="ancho">Ancho</th>
      </thead>
      <tbody id="tabla_persianas">
      </tbody>
    </table>
    <div class="row" id="contenido">

    </div>
  </div>

<div class="row" style="margin-top:25px;">
  <div class="col-sm-12" style="text-align:center;">
    <h5 id="sub">SubTotal&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    <h5 id="desc">Descuento&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    <h5 id="total">Total&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    <div id="firma_aca" style="margin-top:20px;">

    </div>
  </div>
</div>

</div>
<div class="bg-default text-center pad20A mrg25T" style="margin-top:150px !important;">
<div class="form-group col-sm-12">
    <a id="ver" class="btn btn-lg btn-default">Ver Medidas</a>
    <a id="cupon" class="btn btn-lg btn-default" data-toggle="modal" data-target="#modal_cupon">Usar Cupon</a>
    <a id="cotizacion" class="btn btn-lg btn-default">Guardar Cotizacion</a>
    <a id="firmar" class="btn btn-lg btn-default" data-toggle="modal" data-target="#firmas">Firmar</a>
    <a id="imprimir" class="btn btn-lg btn-default">Imprimir</a>
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
              <div class="m-signature-pad--body">
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
  var pedido_s= {!! $pedido !!};
  var persianas = {!! $persianas !!};
  var imagenes = {!! $pedido->images !!};
  var precio=50;
  var pre="{!! $precios !!}";
  var precios_reales= pre.split(",");
  var id = {!! $pedido->id !!};
  console.log(precios_reales);
  var sub=0;
  var total_pedido=0;
  var tabla='';
  for(var f=0;f<persianas.length;f++)
  {
    sub= sub + parseInt(precios_reales[f]);
    tabla+='<tr>';
    tabla+='<td>1</td>';
    tabla+='<td>'+persianas[f].tipo+' '+persianas[f].color+'</td>';
    tabla+='<td>$'+(precios_reales[f])+'</td>';
    tabla+='<td>$'+(precios_reales[f])+'</td>';
    tabla+='<td class="hidden" id="alto'+f+'">'+persianas[f].alto+'</td>';
    tabla+='<td class="hidden" id="ancho'+f+'">'+persianas[f].ancho+'</td>';
    tabla+='</tr>';
  }
  $('#tabla_persianas').append(tabla);

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
    }
    else
    {
      $('#desc').append(''+pedido_s.cupons[0].porcentaje+'%');
      total_pedido=(sub-((sub*pedido_s.cupons[0].porcentaje)/100));
      $('#total').append('$'+total_pedido);
    }
  }
  else
  {
    $('#sub').append('$'+sub);
    $('#desc').append('0%');
    total_pedido=sub;
    $('#total').append('$'+total_pedido);
  }
  // $('#sub').append('$'+sub);
  // $('#total').append('$'+(sub-((sub*10)/100)));

  $('#ver').click(function()
  {
    $('#alto').removeClass('hidden');
    $('#ancho').removeClass('hidden');
    for(var f=0;f<persianas.length;f++)
    {
      $('#alto'+f).removeClass('hidden');
      $('#ancho'+f).removeClass('hidden');
    }
  });
  $('#guarda_firma').click(function()
  {
    $('#loader').show();
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

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "total");
    hiddenField.setAttribute("value", total_pedido);
    form.appendChild(hiddenField);

    form.submit();
  });
  $(document).ready(function()
  {
    $('#loader').hide();
    if(imagenes[0] != undefined)
    {
      $('#firma_aca').html('<img src="http://localhost:8000/'+imagenes[0].contenido.slice(51)+'" alt="Firma...">');
      $('#firmar').hide();
      $('#cupon').hide();
    }
  });

</script>

<script type="text/javascript">
    $(function () {
        $("#imprimir").click(function () {
            var contents = $("#para_impresion").html();
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
              console.log(result);
              if(result.descuento != 0)
              {
                  $('#desc').html('Descuento&nbsp;&nbsp;&nbsp;&nbsp;$ '+result.descuento+' pesos');
                  $('#total').html('Total&nbsp;&nbsp;&nbsp;&nbsp;$'+(sub-result.descuento));
              }
              else
              {
                $('#desc').html('Descuento&nbsp;&nbsp;&nbsp;&nbsp;'+result.porcentaje+'%');
                $('#total').html('Total&nbsp;&nbsp;&nbsp;&nbsp;$'+(sub-((sub*result.porcentaje)/100)));
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
