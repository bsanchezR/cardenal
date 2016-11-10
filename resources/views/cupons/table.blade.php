<table class="table table-responsive" id="cupons-table">
    <thead>
        <th>Numero</th>
        <th>Estado</th>
        <th>Porcentaje</th>
        <th>Descuento</th>
        <th>Vigencia</th>
        <th>Tipo</th>

        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cupons as $cupon)
        <tr>
            <td>{!! $cupon->numero !!}</td>
            <td>{!! $cupon->estado !!}</td>
            <td>{!! $cupon->porcentaje !!}</td>
            <td>{!! $cupon->descuento !!}</td>
            <td>{!! $cupon->vigencia !!}</td>
            <td>{!! $cupon->tipo !!}</td>

            <td>
                {!! Form::open(['route' => ['cupons.destroy', $cupon->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cupons.show', [$cupon->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cupons.edit', [$cupon->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
