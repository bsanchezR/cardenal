<div class="row">
  <div class="col-sm-12">
    <p><b>Folio:</b> {{$pedido->folio}}</p>
  </div>
  <br>
  <div class="col-sm-12">
    <p><b>Tipos de Persiana:</b>
    @foreach($persianas as $cada)
      {{$cada->tipo}}
    @endforeach
  </p>
  </div>
  <br>
  <div class="col-sm-12">
    <h4>Datos del cliente</h4>
  </div>
  <div class="col-sm-12">
    <p><b>Cliente:</b> {{$pedido->cliente->nombre}} {{$pedido->cliente->apellido_paterno}} {{$pedido->cliente->apellido_materno}}<p>
  </div>
  <br>
  <div class="col-sm-12">
    <p><b>Direccion:</b> {{$pedido->cliente->direccion}}</p>
  </div>
  <br>
  <div class="col-sm-12">
    <h4>Materiales existentes en almacen</h4>
  </div>
  <div class="col-sm-12">
    <p>- Motor fuzy 3 lienzos</p>
    <p>- Facias</p>
    <p>- Tubos</p>
  </div>
  <br>
  <div class="col-sm-12">
    <h4>Material por comprar</h4>
  </div>
  <div class="col-sm-12">
    <p>- Control mono canal negro</p>
    <p>- Sheer cromo gy-01-002</p>
  </div>
  <br>
  <div class="col-sm-12">
    <h4>Cobro al Cliente</h4>
    <p>$ 25,000.00 pesos</p>
  </div>
  <br>
  <div class="col-sm-12">
    <h4>Comentarios</h4>
  </div>
  <div class="col-sm-offset-4 col-sm-4">
      {!! Form::text('comentarios', null, ['class' => 'form-control', 'id' => 'mas_comen']) !!}
  </div>
</div>
<br>
