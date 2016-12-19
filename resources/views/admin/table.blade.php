
    <thead>
        <th>Id</th>
        <th>Folio</th>
        <th>Estado</th>
        <th>Vendedor</th>
        <th>Fecha Pedido</th>
        <th>Anticipo</th>
        <th>Pagos</th>
        <th>Total</th>
        <th>Tipo Pago</th>
        <th>Acciones</th>
    </thead>
    <tfoot>
      <th>Id</th>
      <th>Folio</th>
      <th>Estado</th>
      <th>Vendedor</th>
      <th>Fecha Pedido</th>
      <th>Anticipo</th>
      <th>Pagos</th>
      <th>Total</th>
      <th>Tipo Pago</th>
      <th>Acciones</th>
    </tfoot>
    <tbody>
    @foreach($pedidos as $pedido)
        <tr>
            <td>{!! $pedido->id !!}</td>
            <td>{!! $pedido->folio !!}</td>
            <td>{!! $pedido->estado !!}</td>
            <td>{!! $pedido->user->name!!}</td>
            <td>{!! $pedido->fecha_pedido !!}</td>
            <td>
              @if($pedido->monto == '3 meses' || $pedido->monto == '6 meses' || $pedido->monto == '12 meses')
                ---
              @else
                $ {!! $pedido->monto !!}
              @endif
            </td>
            <td>$ {!! $pedido->total_pagos($pedido->id) !!}</td>
            <td>$ {!! $pedido->total !!}</td>
            <td>
              @if($pedido->tipo_pago == 'credito')
                @if($pedido->monto == '3 meses' || $pedido->monto == '6 meses' || $pedido->monto == '12 meses')
                  Tarjeta Credito - {!! $pedido->monto !!}
                @else
                  Tarjeta Credito
                @endif
              @else
                {!! $pedido->tipo_pago !!}
              @endif
            </td>
            <td style="text-align: center;">
                <div class='btn-group'>
                    <a href="{!! route('admin.show', [$pedido->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
