
    <thead>
        <th>Nombre</th>
        <th>Marca Id</th>
        <th>Codigo</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tfoot>
        <th>Nombre</th>
        <th>Marca Id</th>
        <th>Codigo</th>
        <th colspan="3">Acciones</th>
    </tfoot>
    <tbody>
    @foreach($modelos as $modelo)
        <tr>
            <td>{!! $modelo->nombre !!}</td>
            <td>{!! $modelo->marca_id !!}</td>
            <td>{!! $modelo->codigo !!}</td>
            <td style="text-align: center;">
                {!! Form::open(['route' => ['modelos.destroy', $modelo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('modelos.show', [$modelo->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    <a href="{!! route('modelos.edit', [$modelo->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-pencil"></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
