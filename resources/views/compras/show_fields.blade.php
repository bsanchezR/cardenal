<div id="contenido">

<div class="row">
    <div class="col-md-3"><div style="width:100px; height:100px; text-align:center; margin: 0 30%; background: url(../../image-resources/logo.png) left 50% no-repeat;"></div><address class="invoice-address"><b>Fecha de creación:</b> {{$pedido->created_at}}<br><b>Tipos de Persiana:</b>
    @foreach($persianas as $cada)
      {{$cada->tipo}}
    @endforeach</address></div>

      <div class="col-md-6 float-right text-right"><h4 class="invoice-title">Folio</h4>No. <b>#{{$pedido->folio}}</b><div class="divider"></div><div class="invoice-date mrg20B">{{$pedido->fecha_pedido}}</div><button id="imprimir" class="btn btn-alt btn-hover btn-info"><span>Imprimir</span> <i class="glyph-icon icon-print"></i></button>&nbsp;<a class="btn btn-alt btn-hover btn-primary" href="{!! route('compras.edit', [$pedido->id]) !!}"><span>Terminar Pedido</span><i class="glyph-icon icon-tag"></i></a>
      </div>
  </div>
  <br>
  <div class="divider"></div>
  <div class="row">

  <br>
  <div class="col-md-4">
    <h2 class="invoice-client mrg10T">Datos del cliente:</h2><h5>{{$pedido->cliente->nombre}} {{$pedido->cliente->apellido_paterno}} {{$pedido->cliente->apellido_materno}}</h5><address class="invoice-address">{{$pedido->cliente->direccion}}<br>{{$pedido->cliente->telefono}}</address>
  </div>

  <div class="col-md-4">
    <h2 class="invoice-client mrg10T">Materiales existentes en almacen:</h2><h5></h5><address class="invoice-address">- Motor fuzy 3 lienzos<br>- Facias<br>- Tubos<br></address>
  </div>

  <div class="col-md-4">
    <h2 class="invoice-client mrg10T">Material por comprar:</h2><h5></h5>
    <address class="invoice-address">- Control mono canal negro<br>- Sheer cromo gy-01-002<br></address>
  </div>

</div>
<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <h2 class="invoice-client mrg10T">Calculo de gastos:</h2><h5></h5>
    <address class="invoice-address">$ 25,000.00 pesos</address>
    <h2 id="comen" class="invoice-client mrg10T">Comentarios</h2>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control', 'id' => 'mas_comen']) !!}
  </div>
</div>
<br>
</div>
<script type="text/javascript">
$("#imprimir").click(function () {
    $('#comen').hide();
    $('#mas_comen').hide();
    var contents = $("#contenido").html();
    $('#comen').show();
    $('#mas_comen').show  ();
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
</script>
