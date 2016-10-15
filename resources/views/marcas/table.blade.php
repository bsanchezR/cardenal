
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tfoot>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th colspan="3">Acciones</th>
    </tfoot>
    <tbody>
    @foreach($marcas as $marca)
        <tr>
            <td>{!! $marca->nombre !!}</td>
            <td>{!! $marca->descripcion !!}</td>
            <td style="text-align: center;">
                {!! Form::open(['route' => ['marcas.destroy', $marca->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('marcas.show', [$marca->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    <a href="{!! route('marcas.edit', [$marca->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-pencil"></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro ?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
