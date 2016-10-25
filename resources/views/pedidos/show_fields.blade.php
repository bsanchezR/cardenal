<div class="form-group">
    {!! Form::label('id', 'Id :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $pedido->id !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('cliente_id', 'Cliente :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $pedido->cliente->nombre !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('user_id', 'Vendedor :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $pedido->user->name !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('folio', 'Folio :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $pedido->folio !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('control', 'Observaciones :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $pedido->control !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('estado', 'Estado :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $pedido->estado !!}</p>
    </div>
</div>



  <div class="form-group">
    {!! Form::label('numero', 'Numero de Persianas :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $pedido->persianas->count() !!}</p>
    </div>
  </div>
  @foreach($pedido->persianas as $persiana)
  <div class="col s12 divider" style ="margin-top:10px; margin-bottom:10px; background:red;"></div>     
  <div class="form-group">
    {!! Form::label('ids', 'Persiana :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $persiana->id !!}</p>
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('model', 'Modelo :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $persiana->modelo->nombre !!}</p>
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('colo', 'Color :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $persiana->color->nombre !!}</p>
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('type', 'Tipo :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if($persiana->tipo === 'enrrollable')
      <p>Enrrollable</p>
    @elseif($persiana->tipo === 'vertical')
      <p>Vertical</p>
    @elseif($persiana->tipo === 'motorizada')
      <p>Motorizada</p>
    @elseif($persiana->tipo === 'japones')
      <p>Panel Japones</p>
    @endif
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('subtype', 'Subtipo :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if($persiana->subtipo === 'enrrollable')
      <p>Enrrollable</p>
    @elseif($persiana->subtipo === 'sheer')
      <p>Sheer</p>
    @elseif($persiana->subtipo === 'shangrila')
      <p>Shangrila</p>
    @elseif($persiana->subtipo === 'fijo')
      <p>Fijo</p>
    @elseif($persiana->subtipo === 'tela')
      <p>Tela</p>
    @elseif($persiana->subtipo === 'pbc')
      <p>PBC</p>
    @elseif($persiana->subtipo === '2vias')
      <p>2 Vias</p>
    @elseif($persiana->subtipo === '3vias')
      <p>3 Vias</p>
    @elseif($persiana->subtipo === '4vias')
      <p>4 Vias</p>
    @elseif($persiana->subtipo === '5vias')
      <p>5 Vias</p>
    @endif
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('contr', 'Control :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if($persiana->control_p === 'izquierdo')
      <p>Izquierdo</p>
    @elseif($persiana->control_p === 'derecho')
      <p>Derecho</p>
    @endif
    </div>
  </div>
  @if($persiana->motor !== '')
    <div class="form-group">
      {!! Form::label('motr', 'Motor :',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
      @if($persiana->motor === 'independiente')
        <p>Independiente</p>
      @elseif($persiana->motor === '2 lienzos')
        <p>2 Lienzos</p>
      @elseif($persiana->motor === '3 lienzos')
        <p>3 Lienzos</p>
      @endif
      </div>
    </div>
  @endif
  <div class="form-group">
    {!! Form::label('ubi', 'Ubicacion del soporte :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if($persiana->soporte_u === 'techo')
      <p>Techo</p>
    @elseif($persiana->soporte_u === 'muro')
      <p>Muro</p>
    @endif
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('coloc', 'Colocacion del soporte :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if($persiana->soporte_m === 'fuera')
      <p>Por fuera</p>
    @elseif($persiana->soporte_m === 'dentro')
      <p>Por dentro</p>
    @endif
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('coloc', 'Ubicacion en la ventana del soporte :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if($persiana->soporte_p === 'intermedio')
      <p>Intermedio</p>
    @elseif($persiana->soporte_p === 'lateral')
      <p>Lateral</p>
    @endif
    </div>
  </div>
  @if($persiana->soporte_a !== '')
    <div class="form-group">
      {!! Form::label('adic', 'Adicional al soporte :',['class' => 'control-label col-sm-3']) !!}
      <div class="col-sm-6">
      @if($persiana->soporte_a === 'andamio')
        <p>Andamio</p>
      @elseif($persiana->soporte_a === 'escalera')
        <p>Escalera de extension</p>
      @endif
      </div>
    </div>
  @endif
  <div class="col s12"></div>
  <div class="form-group">
    {!! Form::label('alt', 'Alto :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $persiana->alto !!}</p>
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('anch', 'Ancho :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $persiana->ancho !!}</p>
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('larg', 'Largo :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $persiana->largo !!}</p>
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('are', 'Area :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $persiana->area !!}</p>
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('obse', 'Observaciones :',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $persiana->observaciones !!}</p>
    </div>
  </div>
  <div class="col s12 divider" style ="margin-top:10px; margin-bottom:10px; background:red;"></div>
  @endforeach


<div class="form-group">
    {!! Form::label('fecha_pedido', 'Fecha Pedido:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $pedido->fecha_pedido !!}</p>
    </div>
</div>


<div class="form-group">
    {!! Form::label('fecha_entrega', 'Fecha Entrega:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if($pedido->fecha_entrega == '')
      <p>No se a especificado</p>
    @else
      <p>{!! $pedido->fecha_entrega !!}</p>
    @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('fecha_produccion', 'Fecha Produccion:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if($pedido->fecha_produccion == '')
      <p>No se a especificado</p>
    @else
      <p>{!! $pedido->fecha_produccion !!}</p>
    @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('fecha_instalacion', 'Fecha Instalacion:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if($pedido->fecha_instalacion == '')
      <p>No se a especificado</p>
    @else
      <p>{!! $pedido->fecha_instalacion !!}</p>
    @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('created_at', 'Created At:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $pedido->created_at !!}</p>
    </div>
</div>


<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:',['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <p>{!! $pedido->updated_at !!}</p>
    </div>
</div>
