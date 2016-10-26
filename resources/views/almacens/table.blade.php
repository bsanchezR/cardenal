<!-- <table class="table table-responsive" id="almacens-table"> -->
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
        <th>Alto</th>
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
        <th>Alto</th>
        <th>Stock</th>
        <th colspan="3">Action</th>
    </tfoot>
    <tbody>
    @foreach($almacens as $almacen)
        <tr>
            <td>{!! $almacen->nombre !!}</td>
            <td>{!! $almacen->codigo !!}</td>
            <td>{!! $almacen->marca !!}</td>
            <td>{!! $almacen->tipo !!}</td>
            <td>{!! $almacen->categoria !!}</td>
            <td>{!! $almacen->precio !!}</td>
            <td>{!! $almacen->color !!}</td>
            <td>{!! $almacen->diametro !!}</td>
            <td>{!! $almacen->largo !!}</td>
            <td>{!! $almacen->alto !!}</td>
            <td>{!! $almacen->stock !!}</td>
            <td>
                {!! Form::open(['route' => ['almacens.destroy', $almacen->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('almacens.show', [$almacen->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    <a href="{!! route('almacens.edit', [$almacen->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-pencil"></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
              

            </td>
        </tr>
    @endforeach
    </tbody>
<!-- </table> -->
