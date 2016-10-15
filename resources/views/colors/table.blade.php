
    <thead>
        <th>Nombre</th>
        <th>Codigo</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tfoot>
        <th>Nombre</th>
        <th>Codigo</th>
        <th colspan="3">Acciones</th>
    </tfoot>
    <tbody>
    @foreach($colors as $color)
        <tr>
            <td>{!! $color->nombre !!}</td>
            <td>{!! $color->codigo !!}</td>
            <td style="text-align: center;">
                {!! Form::open(['route' => ['colors.destroy', $color->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('colors.show', [$color->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    <a href="{!! route('colors.edit', [$color->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-pencil"></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
