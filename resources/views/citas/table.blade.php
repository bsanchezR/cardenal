
    <thead>
        <th>Id</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Cliente</th>
        <th>Notas</th>
        <th>Asignar</th>
        <th>Action</th>
    </thead>
    <tfoot>
        <th>Id</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Cliente</th>
        <th>Notas</th>
        <th>Asignar</th>
        <th>Action</th>
    </tfoot>
    <tbody>
    @foreach($citas as $cita)

        <tr>
            <td>{!! $cita->id !!}</td>
            <td>{!! $cita->fecha !!}</td>
            <td>{!! $cita->hora !!}</td>
            <td>{!! $cita->cliente->nombre !!}</td>
            <td>{!! $cita->notas !!}</td>
            @if(empty($cita->user->name))
              <td>--</td>
            @else
              <td>{!! $cita->user->name !!}</td>
            @endif
            <td style="text-align:center;">
                {!! Form::open(['route' => ['citas.destroy', $cita->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('citas.show', [$cita->id]) !!}" class='btn btn-default btn-md'><i class="glyph-icon icon-eye"></i></a>
                    @if(Auth::user()->tipo_usuario === 'administrador')
                    <a href="{!! route('citas.edit', [$cita->id]) !!}" class='btn btn-default btn-md'><i class="glyph-icon icon-pencil"></i></a>
                    <a class='btn btn-default btn-md asignar' data-id="{!! $cita->id !!}" data-toggle="modal" data-target="#myModal" ><i class="glyph-icon icon-user"  ></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash "></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
