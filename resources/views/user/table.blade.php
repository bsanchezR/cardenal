<!-- <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%" > -->
  <!-- class="table table-responsive" id="user-table" -->
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Tipo usuario</th>
        <th>E-mail</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Tipo usuario</th>
        <th>E-mail</th>
        <th>Acciones</th>
      </tr>
    </tfoot>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->telefono!!}</td>
            <td>{!! $user->tipo_usuario !!}</td>
            <td>{!! $user->email !!}</td>
            <td style="text-align: center;"
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('user.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-eye"></i></a>
                    @if(Auth::user()->tipo_usuario === 'administrador')
                    <a href="{!! route('user.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyph-icon icon-pencil"></i></a>
                    {!! Form::button('<i class="glyph-icon icon-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
<!-- </table> -->
