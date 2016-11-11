
    <thead>
        <th>Titulo</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Id Cliente</th>
        <th>Notas</th>
        <th>Asignar</th>
        <th colspan="3">Action</th>
    </thead>
    <tfoot>
        <th>Titulo</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Id Cliente</th>
        <th>Notas</th>
        <th>Asignar</th>
        <th colspan="3">Action</th>
    </tfoot>
    <tbody>
    @foreach($citas as $cita)
        <tr>
            <td>{!! $cita->titulo !!}</td>
            <td>{!! $cita->fecha !!}</td>
            <td>{!! $cita->hora !!}</td>
            <td>{!! $cita->id_cliente !!}</td>
            <td>{!! $cita->notas !!}</td>
            <td>{!! $cita->asignar !!}</td>
            <td>
                {!! Form::open(['route' => ['citas.destroy', $cita->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('citas.show', [$cita->id]) !!}" class='btn btn-default btn-md'><i class="glyph-icon icon-eye"></i></a>
                    <a href="{!! route('citas.edit', [$cita->id]) !!}" class='btn btn-default btn-md'><i class="glyph-icon icon-pencil"></i></a>
                    <a class='btn btn-default btn-md asignar' data-id="{!! $cita->id !!}" data-toggle="modal" data-target="#myModal" ><i class="glyph-icon icon-user"  ></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash "></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
