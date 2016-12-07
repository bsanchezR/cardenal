
    <thead>
        <th>Id</th>
        <th>No. Cliente</th>
        <th>No. Usuario</th>
        <th>Folio</th>
        <th>Observaciones</th>
        <th>Estado</th>
        <th>Fecha Pedido</th>
        <th>Acciones</th>
    </thead>
    <tfoot>
        <th>Id</th>
        <th>No. Cliente</th>
        <th>No. Usuario</th>
        <th>Folio</th>
        <th>Observaciones</th>
        <th>Estado</th>
        <th>Fecha Pedido</th>
        <th>Acciones</th>
    </tfoot>
    <tbody>
    @foreach($pedidos as $pedido)
        <tr>
            <td>{!! $pedido->id !!}</td>
            <td>{!! $pedido->cliente_id !!}</td>
            <td>{!! $pedido->user_id !!}</td>
            <td>{!! $pedido->folio !!}</td>
            <td>{!! $pedido->control !!}</td>
            <td>{!! $pedido->estado !!}</td>
            <td>{!! $pedido->fecha_pedido !!}</td>
            <td style="text-align: center;">
                {!! Form::open(['route' => ['compras.destroy', $pedido->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('compras.show', [$pedido->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    @if(Auth::user()->tipo_usuario === 'administrador')
                    {!! Form::button('<i class="glyph-icon icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
