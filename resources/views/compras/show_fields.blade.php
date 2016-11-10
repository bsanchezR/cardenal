<div class="row">
    <div class="col-md-3"><div style="width:100px; height:100px; text-align:center; margin: 0 30%; background: url(../../image-resources/logo.png) left 50% no-repeat;"></div><address class="invoice-address"><b>Fecha de creación:</b> {{$pedido->created_at}}<br><b>Tipos de Persiana:</b>
    @foreach($persianas as $cada)
      {{$cada->tipo}}
    @endforeach</address></div>

      <div class="col-md-6 float-right text-right"><h4 class="invoice-title">Folio</h4>No. <b>#{{$pedido->folio}}</b><div class="divider"></div><div class="invoice-date mrg20B">{{$pedido->fecha_pedido}}</div><button onclick="printInvoice()" class="btn btn-alt btn-hover btn-info"><span>Imprimir</span> <i class="glyph-icon icon-print"></i></button> <button onclick="printInvoice()" class="btn btn-alt btn-hover btn-danger"><span>Terminar Pedido</span> <i class="glyph-icon icon-trash"></i></button>
      </div>
  </div>
  <br>
  <div class="divider"></div>
  <div class="row">
    <!-- <div class="col-sm-12">
      <p><b>Folio:</b> {{$pedido->folio}}</p>
    </div>
    <br>
    <div class="col-sm-12">
      <p><b>Tipos de Persiana:</b>
      @foreach($persianas as $cada)
        {{$cada->tipo}}
      @endforeach
    </p>
    </div> -->

  <br>
  <div class="col-md-4">
    <h2 class="invoice-client mrg10T">Datos del cliente:</h2><h5>{{$pedido->cliente->nombre}} {{$pedido->cliente->apellido_paterno}} {{$pedido->cliente->apellido_materno}}</h5><address class="invoice-address">{{$pedido->cliente->direccion}}<br>{{$pedido->cliente->telefono}}</address>
  </div>

  <div class="col-md-4">
    <h2 class="invoice-client mrg10T">Materiales existentes en almacen:</h2><address class="invoice-address">- Motor fuzy 3 lienzos<br>- Facias<br>- Tubos<br></address>
  </div>

  <div class="col-md-4">
    <h2 class="invoice-client mrg10T">Material por comprar:</h2>
    <address class="invoice-address">- Control mono canal negro<br>- Sheer cromo gy-01-002<br></address>
  </div>

</div>
<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <h2 class="invoice-client mrg10T">Calculo de gastos:</h2>
    <address class="invoice-address">$ 25,000.00 pesos</address>
    {!! Form::text('comentarios', null, ['class' => 'form-control', 'id' => 'mas_comen']) !!}
  </div>


</div>
<br>
