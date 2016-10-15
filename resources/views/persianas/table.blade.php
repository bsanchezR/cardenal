<table class="table table-responsive" id="persianas-table">
    <thead>
        <th>Numero de pedido</th>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Tipo</th>
        <th>Subtipo</th>
        <th>Control P</th>
        <th>Motor</th>
        <th>Soporte U</th>
        <th>Soporte M</th>
        <th>Soporte A</th>
        <th>Soporte P</th>
        <th>Area</th>
        <th>Largo</th>
        <th>Observaciones</th>
        <th>Alto</th>
        <th>Ancho</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($persianas as $persiana)
        <tr>
            <td>{!! $persiana->pedido->folio !!}</td>
            <td>{!! $persiana->modelo->nombre !!}</td>
            <td>{!! $persiana->modelo->marca->nombre !!}</td>
            <td>{!! $persiana->color->nombre !!}</td>
            <td>{!! $persiana->tipo !!}</td>
            <td>{!! $persiana->subtipo !!}</td>
            <td>{!! $persiana->control_p !!}</td>
            <td>{!! $persiana->motor !!}</td>
            <td>{!! $persiana->soporte_u !!}</td>
            <td>{!! $persiana->soporte_m !!}</td>
            <td>{!! $persiana->soporte_a !!}</td>
            <td>{!! $persiana->soporte_p !!}</td>
            <td>{!! $persiana->area !!}</td>
            <td>{!! $persiana->largo !!}</td>
            <td>{!! $persiana->observaciones !!}</td>
            <td>{!! $persiana->alto !!}</td>
            <td>{!! $persiana->ancho !!}</td>
            <td>
                {!! Form::open(['route' => ['persianas.destroy', $persiana->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('persianas.show', [$persiana->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('persianas.edit', [$persiana->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro ?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
