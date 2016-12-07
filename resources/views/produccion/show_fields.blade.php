<div id="contenido">

<div class="row">
    <div class="col-md-3"><div style="width:100px; height:100px; text-align:center; margin: 0 30%; background: url(../../image-resources/logo.png) left 50% no-repeat;"><img src="../../image-resources/logo.png" alt="" /></div><address class="invoice-address"><b>Fecha de creación:</b> {{$pedido->created_at}}<br>
    @if($pedido->monto != '3 meses' && $pedido->monto != '6 meses' && $pedido->monto != '12 meses')
      <b>Monto pagado: </b>{{ round(($pedido->monto*100)/$pedido->total) }}%</address></div>
    @else
      <b>Monto pagado: </b>100%</address></div>
    @endif
      <div class="col-md-6 float-right text-right"><h4 class="invoice-title">Folio</h4>No. <b>#{{$pedido->folio}}</b><div class="divider"></div><div class="invoice-date mrg20B">{{$pedido->fecha_pedido}}</div>
      <button id="imprimir" class="btn btn-alt btn-hover btn-info"><span>Imprimir</span> <i class="glyph-icon icon-print"></i></button>&nbsp;
      <a id="terminar" class="btn btn-alt btn-hover btn-primary" href="{!! route('produccion.edit', [$pedido->id]) !!}"><span>Terminar Pedido</span><i class="glyph-icon icon-tag"></i></a>
      </div>
  </div>
  <br>
  <div class="divider"></div>
  <div class="row">
  <br>
  <div class="col-md-12">
    <h2>Persianas</h2>
  </div>
  <table class="table mrg20T table-hover" id="tabla">
    @foreach($persianas as $cada)
    <thead>
      <tr>
        <th>#</th>
        <th>Ancho</th>
        <th>Alto</th>
        <th>Sistema</th>
        <th>Motor</th>
        <th>Tipo de Motor</th>
        <th>Lado del Motor</th>
        <th>Lado del Control</th>
        <th>Altura del Control</th>
        <th>Soporte</th>
        <th>Fijar a</th>
        <th>Vinculada</th>
        <th class="ocultate">Código de barras</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td>{{$cada->id}}</td>
      <td>{{$cada->ancho}}</td>
      <td>{{$cada->alto}}</td>
      @if($cada->motor != "" && $cada->motor != " ")
        <td>Motorizado</td>
        <td>{{$cada->motor}}</td>
        <td>{{$cada->tipo_motor}}</td>
        <td>{{$cada->lado_motor}}</td>
        <td>--</td>
        <td>--</td>
        <td>--</td>
        <td>{{$cada->soporte_u}}</td>
        @if($cada->vinculacion != null)
          <td>{{$cada->vinculacion}}</td>
        @else
          <td>--</td>
        @endif
      @else
        <td>Manual</td>
        <td>--</td>
        <td>--</td>
        <td>--</td>
        <td>{{$cada->control_p}}</td>
        <td>{{$cada->altura_control}}</td>
        @if($cada->soporte_p != '' && $cada->soporte_p != ' ')
          <td>{{$cada->soporte_p}}</td>
        @else
          <td>Independiente</td>
        @endif
        <td>{{$cada->soporte_u}}</td>
        @if($cada->vinculacion != null)
          <td>{{$cada->vinculacion}}</td>
        @else
          <td>--</td>
        @endif
      @endif
      <td class="ocultate"><button id="imprimir{{$cada->id}}" onclick="imprime('{{$cada->codigo_barras}}')" class="btn btn-alt btn-hover btn-info"><span>Imprimir Código</span><i class="glyph-icon icon-print"></i></button></td>
    </tr>
    </tbody>
    <thead>
      <tr>
        <th colspan="3">Tipo</th>
        <th colspan="3">Modelo</th>
        <th colspan="3">Color</th>
        <th colspan="3">Marca</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td colspan="3">{{$cada->tipo}}</th>
      <td colspan="3">{{$cada->modelo->nombre}}</th>
      <td colspan="3">{{$cada->modelo->color}}</th>
      <td colspan="3">{{$cada->modelo->marca->nombre}}</th>
    </tr>
    </tbody>
    @endforeach
  </table>
</div>
<!-- <div class="row">
  <div class="col-md-offset-4 col-md-4">
    <h5></h5>
    <h2 id="comen" class="invoice-client mrg10T">Observaciones</h2>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control', 'id' => 'mas_comen']) !!}
  </div>
</div> -->
<br>
</div>
<div id="codigo" class="">
  <svg id="barras"></svg>
</div>
<script type="text/javascript" src="{{ asset('barcode.all.min.js') }}"></script>
<script type="text/javascript">
$('#codigo').hide();
function imprime(numero)
{
  $('#codigo').show();
  JsBarcode("#barras", numero);
  var contents = $("#codigo").html();
  $('#codigo').hide();
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
}
$("#imprimir").click(function () {
    $('#comen').hide();
    $('#mas_comen').hide();
    var x = document.getElementsByClassName("ocultate");
    for(var i=0;i<x.length;i++)
    {
      console.log(x[i]);
      x[i].classList.add('hidden');
    }
    $('#tabla').width('95%');
    $('#terminar').hide();
    $('#imprimir').hide();
    var contents = $("#contenido").html();
    $('#tabla').width('100%');
    $('#comen').show();
    $('#terminar').show();
    $('#imprimir').show();
    $('#mas_comen').show  ()
    for(var i=0;i<x.length;i++)
    {
      console.log(x[i]);
      x[i].classList.remove('hidden');
    }
    var frame1 = $('<iframe />');
    frame1[0].name = "frame1";
    frame1.css({ "position": "absolute", "top": "-1000000px" });
    $("body").append(frame1);
    var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
    frameDoc.document.open();
    //Create a new HTML document.
    frameDoc.document.write('<html><head><title>Cotización</title><style>#tabla{margin-left:12px;}</style>');
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
