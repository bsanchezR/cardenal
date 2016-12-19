<!-- Id Field -->
<div class="row">
<div class="">
    {!! Form::label('vendedor', 'Vendedor:',['class' => 'invoice-client mrg10T col-sm-3']) !!}
    <div class="invoice-address col-sm-3">
    <p class="invoice-address">{!! $pedido->user->name !!}</p>
    </div>
</div>

<div class="">
    {!! Form::label('tipo_pago', 'Tipo de Pago:',['class' => 'invoice-client mrg10T col-sm-3']) !!}
    <div class="invoice-address col-sm-3">
      <p class="invoice-address">
        @if( $pedido->tipo_pago == 'credito')
          @if( $pedido->monto == '3 meses' || $pedido->monto == '6 meses' || $pedido->monto == '12 meses')
              Tarjeta de Credito - {!! $pedido->monto !!}
          @endif
        @else
            {!! $pedido->tipo_pago !!}
        @endif
      </p>
    </div>
</div>
</div>

<!-- Nombre Field -->
<div class="row">
<div class="">
    {!! Form::label('monto', 'Anticipo al momento de levantar el pedido:',['class' => 'invoice-client mrg10T col-sm-3']) !!}
    <div class="col-sm-3">
        @if( $pedido->monto == '3 meses' || $pedido->monto == '6 meses' || $pedido->monto == '12 meses')
            <p class="invoice-address">---</p>
        @else
            <p class="invoice-title">${!! $pedido->monto !!}</p>
        @endif
    </div>
</div>


<div class="">
    {!! Form::label('total', 'Total del pedido:',['class' => 'invoice-client mrg10T col-sm-3']) !!}
    <div class="col-sm-3">
    <p class="invoice-title font-blue">$ {!! $pedido->total !!}</p>
    </div>
</div>
</div>




@if( $pedido->monto != '3 meses' && $pedido->monto != '6 meses' && $pedido->monto != '12 meses' && $pedido->pagos_historial != null)
<div class="divider"></div>
<div class="divider"></div>
<div class="col-sm-12">
  <h5>Detalle del historial de pagos</h5>
</div>
<table class="table mrg20T table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Monto</th>
        <th>Fecha</th>
        <th>Usuario que Recibio</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pedido->pagos_historial as $pago)
      <tr>
        <td>{!! $pago->id !!}</td>
        <td>$ {!! $pago->monto !!}</td>
        <td>{!! explode(" ",$pago->fecha)[0] !!}</td>
        <td>{!! $pago->user->name !!}</td>
      </tr>
      @endforeach
      <tr class="font-bold font-black">
        <td colspan="3" class="text-right">SUBTOTAL:</td>
        <td colspan="3" class="font-blue font-size-23">$ {!! $pedido->total_pagos($pedido->id) !!}</td>
      </tr>
      <tr class="font-bold font-black">
        <td colspan="3" class="text-right">TOTAL (con anticipo):</td>
        <td colspan="3" class="font-blue font-size-23">$ {!! $pedido->total_pagos($pedido->id)+$pedido->monto !!}</td>
      </tr>
      @if(($pedido->total_pagos($pedido->id)+$pedido->monto) < $pedido->total)
      <tr class="font-bold font-black">
        <td colspan="3" class="text-right">RESTANTE:</td>
        <td colspan="3" class="font-red font-size-23">$ {!! $pedido->total-($pedido->total_pagos($pedido->id)+$pedido->monto) !!}</td>
      </tr>
      @endif
    </tbody>
</table>


@endif
