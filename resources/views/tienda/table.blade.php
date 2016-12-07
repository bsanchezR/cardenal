
    <thead>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Horario</th>
        <th>Telefono</th>
        <th>Acciones</th>
    </thead>
    <tfoot>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Horario</th>
        <th>Telefono</th>
        <th>Acciones</th>
    </tfoot>
    <tbody>
    @foreach($tienda as $ti)
        <tr>
            <td>{!! $ti->nombre !!}</td>
            <td>{!! $ti->direccion !!}</td>
            <td>{!! $ti->horario !!}</td>
            <td>{!! $ti->telefono !!}</td>
            <td style="text-align: center;">
                {!! Form::open(['route' => ['tienda.destroy', $ti->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tienda.show', [$ti->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    @if(Auth::user()->tipo_usuario === 'administrador')
                    <a href="{!! route('tienda.edit', [$ti->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-pencil"></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro ?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
