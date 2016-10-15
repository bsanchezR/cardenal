<!-- <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%" > -->
  <!-- class="table table-responsive" id="user-table" -->
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Telefono 2</th>
        <th>Tipo cliente</th>
        <th>E-mail</th>
        <th colspan="3">Acciones</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Telefono 2</th>
        <th>Tipo cliente</th>
        <th>E-mail</th>
        <th colspan="3">Acciones</th>
      </tr>
    </tfoot>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{!! $cliente->nombre !!}</td>
            <td>{!! $cliente->apellido_paterno !!}</td>
            <td>{!! $cliente->apellido_materno !!}</td>
            <td>{!! $cliente->direccion !!}</td>
            <td>{!! $cliente->telefono!!}</td>
            <td>{!! $cliente->telefono2!!}</td>
            <td>{!! $cliente->tipo !!}</td>
            <td>{!! $cliente->email!!}</td>
            <td style="text-align: center;">
                {!! Form::open(['route' => ['cliente.destroy', $cliente->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cliente.show', [$cliente->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    <a href="{!! route('cliente.edit', [$cliente->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-pencil"></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
<!-- </table> -->
