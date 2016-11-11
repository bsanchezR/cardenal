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
  <div class="col-md-12">
    <h2>Persianas</h2>
  </div>
  <table class="table mrg20T table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Alto</th>
        <th>Ancho</th>
        <th>Sistema</th>
        <th>Motor</th>
        <th>Tipo de Motor</th>
        <th>Lado del Motor</th>
        <th>Lado del Control</th>
        <th>Altura del Control</th>
        <th>Soporte</th>
        <th>Fijar a</th>
        <th>Vinculada</th>
        <th>Código de barras</th>
      </tr>
    </thead>
    <tbody>
    @foreach($persianas as $cada)
    <tr>
      <td>{{$cada->id}}</td>
      <td>{{$cada->alto}}</td>
      <td>{{$cada->ancho}}</td>
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
        <td>{{$cada->soporte_u}}</td>
        @if($cada->soporte_p != '' && $cada->soporte_p != ' ')
          <td>{{$cada->soporte_p}}</td>
        @else
          <td>Independiente</td>
        @endif
        @if($cada->vinculacion != null)
          <td>{{$cada->vinculacion}}</td>
        @else
          <td>--</td>
        @endif
      @endif
      <td><button id="imprimir{{$cada->id}}" onclick="imprime({{$cada->codigo_barras}})" class="btn btn-alt btn-hover btn-info"><span>Imprimir Código</span> <i class="glyph-icon icon-print"></i></button></td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <h5></h5>
    <h2 id="comen" class="invoice-client mrg10T">Observaciones</h2>
    {!! Form::textarea('comentarios', null, ['class' => 'form-control', 'id' => 'mas_comen']) !!}
  </div>
</div>
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
