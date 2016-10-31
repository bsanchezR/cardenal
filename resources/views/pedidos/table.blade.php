
    <thead>
        <th>Id</th>
        <th>No. Cliente</th>
        <th>No. Usuario</th>
        <th>Folio</th>
        <th>Observaciones</th>
        <th>Estado</th>
        <th>Fecha Pedido</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tfoot>
        <th>Id</th>
        <th>No. Cliente</th>
        <th>No. Usuario</th>
        <th>Folio</th>
        <th>Observaciones</th>
        <th>Estado</th>
        <th>Fecha Pedido</th>
        <th colspan="3">Acciones</th>
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
            <td >
                {!! Form::open(['route' => ['pedidos.destroy', $pedido->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cotizar.pedidos', [$pedido->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    <a href="{!! route('pedidos.edit', [$pedido->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-pencil"></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
