    <thead>
        <th>Nombre</th>
        <th>Codigo</th>
        <th>Marca</th>
        <th>Tipo</th>
        <th>Categoria</th>
        <th>Precio</th>
        <th>Color</th>
        <th>Diametro</th>
        <th>Largo</th>
        <th>Ancho</th>
        <th>Stock</th>
        <th colspan="3">Action</th>
    </thead>
    <tfoot>
        <th>Nombre</th>
        <th>Codigo</th>
        <th>Marca</th>
        <th>Tipo</th>
        <th>Categoria</th>
        <th>Precio</th>
        <th>Color</th>
        <th>Diametro</th>
        <th>Largo</th>
        <th>Ancho</th>
        <th>Stock</th>
        <th colspan="3">Action</th>
    </tfoot>
    <tbody>
    @foreach($mermas as $merma)
        <tr>
            <td>{!! $merma->nombre !!}</td>
            <td>{!! $merma->codigo !!}</td>
            <td>{!! $merma->marca !!}</td>
            <td>{!! $merma->tipo !!}</td>
            <td>{!! $merma->categoria !!}</td>
            <td>{!! $merma->precio !!}</td>
            <td>{!! $merma->color !!}</td>
            <td>{!! $merma->diametro !!}</td>
            <td>{!! $merma->largo !!}</td>
            <td>{!! $merma->ancho !!}</td>
            <td>{!! $merma->stock !!}</td>
            <td>
                {!! Form::open(['route' => ['mermas.destroy', $almacen->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mermas.show', [$merma->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    <a href="{!! route('mermas.edit', [$merma->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-pencil"></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}


            </td>
        </tr>
    @endforeach
    </tbody>
