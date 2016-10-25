@extends('vistas.panel')

@section('content')

<div class="col-sm-12">
    <div class="col-sm-6">
        <h3>Cotización Pedido No.</h3>
    </div>
    <div class="col-sm-6">
        <h3>{{$pedido->folio}}</h3>
    </div>
</div>
<div class="col-sm-12">
  <div class="row">
    <div class="col-sm-2">
      <h5>Cantidad</h5>
    </div>
    <div class="col-sm-6">
      <h5>Descripcion</h5>
    </div>
    <div class="col-sm-2">
      <h5>Precio Unitario</h5>
    </div>
    <div class="col-sm-2">
      <h5>SubTotal</h5>
    </div>
  </div>
  <div class="row" id="contenido">

  </div>
</div>
<div class="row" style="margin-top:25px;">
  <div class="col-sm-12" style="text-align:center;">
    <h5 id="sub">SubTotal&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    <h5 id="desc">Descuento&nbsp;&nbsp;&nbsp;&nbsp;10%</h5>
    <h5 id="total">Total&nbsp;&nbsp;&nbsp;&nbsp;</h5>
    <div id="firma_aca">

    </div>
  </div>
</div>
<div class="bg-default text-center pad20A mrg25T" style="margin-top:150px !important;">
<div class="form-group col-sm-12">
    <a id="ver" class="btn btn-lg btn-default">Ver Medidas</a>
    <a id="cupon" class="btn btn-lg btn-default">Generar Cupon</a>
    <a id="cotizacion" class="btn btn-lg btn-default">Guardar Cotizacion</a>
    <a id="firmar" class="btn btn-lg btn-default" data-toggle="modal" data-target="#firmas">Firmar</a>
    <a id="imprimir" class="btn btn-lg btn-default">Imprimir</a>
    <a id="vigencia" class="btn btn-lg btn-default">Vigencia</a>
</div>
</div>


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
  var persianas = {!! $persianas !!};
  var precio=50;
  console.log(persianas);
  console.log(persianas[0].modelo);
  var sub=0;
  for(var f=0;f<persianas.length;f++)
  {
    $('#contenido').append('<div class="col-sm-2"><p>1</p></div>');
    $('#contenido').append('<div class="col-sm-6"><p>'+persianas[f].tipo+' '+persianas[f].color+'</p></div>');
    $('#contenido').append('<div class="col-sm-2"><p>$'+(precio*persianas[f].alto)+'</p></div>');
    $('#contenido').append('<div class="col-sm-2"><p id="subtotal'+f+'">$'+(precio*persianas[f].alto)+'</p></div>');
    $('#contenido').append('<div id="medidas'+f+'" class="col-sm-12 hidden" style="text-align:center;"><h5>Alto:&nbsp;'+persianas[f].alto+'&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;Ancho:&nbsp;'+persianas[f].ancho+'</h5></div>');
    sub+=precio*persianas[f].alto;
  }
  $('#sub').append('$'+sub);
  $('#total').append('$'+(sub-((sub*10)/100)));

  $('#ver').click(function()
  {
    for(var f=0;f<persianas.length;f++)
    {
      // document.getElementById('medidas'+f).removeClass('hidden');
      $('#medidas'+f).removeClass('hidden');
    }
  });
  $('#guarda_firma').click(function()
  {
    console.log(document.getElementById("cont_imagen").children[0]);
    var firm= document.getElementById("cont_imagen").children[0];
    $('#firma_aca').html(firm);
  });

</script>
@endsection
