
    <thead>
        <th>Nombre</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Ancho maximo</th>
        <th>Acciones</th>
    </thead>
    <tfoot>
        <th>Nombre</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Ancho maximo</th>
        <th>Acciones</th>
    </tfoot>
    <tbody>
    @foreach($modelos as $modelo)
        <tr>
            <td>{!! $modelo->nombre !!}</td>
            <td>{!! $modelo->marca->nombre !!}</td>
            <td>{!! $modelo->color !!}</td>
            <td>{!! $modelo->max_ancho !!}</td>
            <td style="text-align: center;">
                {!! Form::open(['route' => ['modelos.destroy', $modelo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('modelos.show', [$modelo->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    @if(Auth::user()->tipo_usuario === 'administrador')
                    <a href="{!! route('modelos.edit', [$modelo->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-pencil"></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
