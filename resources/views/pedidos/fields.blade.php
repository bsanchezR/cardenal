<div class="form-group col-sm-6">
    {!! Form::label('tipo_p', 'Tipo Persiana:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <select class="form-control" name="tipo" id="tipo">
        <option value="enrrollable">Enrrollable</option>
        <option value="vertical">Vertical</option>
        <option value="motorizada">Motorizada</option>
        <option value="japones">Japones</option>
      </select>

    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('folio', 'Folio:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::text('folio', null, ['class' => 'form-control', 'id' => 'foli_n']) !!}
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('marca', 'Marca:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <select class="form-control" name="marca_id" id="marca_id" onchange='misFun({!! $marcas !!})'>
      @foreach($marcas as $marca)
        @if(isset($pedido))
          <option value="{{$marca->id}}" selected="selected">{{$marca->nombre}}</option>
        @else
          <option value="{{$marca->id}}">{{$marca->nombre}}</option>
        @endif
      @endforeach
    </select>
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('modelo', 'Modelo:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      <select class="form-control" name="modelo_id" id="modelo_id" onchange='misFunction({!! $modelos !!})' onclick='misFunction({!! $modelos !!})'>
      </select>

    </div>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('color_id', 'Color:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <select class="form-control" name="color_id" id="color_id">
    </select>
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <select class="form-control" name="cliente_id">
      @foreach($clientes as $cliente)
        @if(isset($pedido) && $pedido->cliente_id == $cliente->id)
          <option value="{{$cliente->id}}" selected="selected">{{$cliente->nombre}}</option>
        @else
          <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
        @endif
      @endforeach
    </select>
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Vendedor:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    <select class="form-control" name="user_id">
      @foreach($usuarios as $usuario)
        @if(isset($pedido) && $pedido->user_id == $usuario->id)
          <option value="{{$usuario->id}}" selected='slected'>{{$usuario->name}}</option>
        @else
          <option value="{{$usuario->id}}">{{$usuario->name}}</option>
        @endif
      @endforeach
    </select>
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('numero', 'No de Persianas a cotizar:', ['class' => 'control-label col-sm-5']) !!}
    <div class="col-sm-4">
    {!! Form::number('numero', null, ['class' => 'form-control', 'id' => 'noper' , 'onchange' => 'cuantas()']) !!}
    </div>
</div>

<div id="divider1" class="col-sm-12 divider" style ="margin-top:10px; margin-bottom:10px; background:red;"></div>
<div id="divider2" class="col-sm-12 divider" style ="margin-top:10px; margin-bottom:10px; background:red;"></div>

<div id="persianas" class="">

</div>

<div id="divider3" class="col-sm-12 divider" style ="margin-top:10px; margin-bottom:10px; background:red;"></div>
<div id="divider4" class="col-sm-12 divider" style ="margin-top:10px; margin-bottom:10px; background:red;"></div>

<div class="form-group">
    {!! Form::label('control', 'Observaciones:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    {!! Form::textarea('control', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Fecha Pedido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_pedido', 'Fecha Pedido:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if(isset($pedido))
        {!! Form::date('fecha_pedido', $pedido->fecha_pedido, ['class' => 'form-control']) !!}
    @else
        {!! Form::date('fecha_pedido', null, ['class' => 'form-control']) !!}
    @endif
    </div>
</div>

<!-- Fecha Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_entrega', 'Fecha Entrega:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if(isset($pedido) && $pedido->fecha_entrega !== '')
      {!! Form::date('fecha_entrega', $pedido->fecha_entrega, ['class' => 'form-control']) !!}
    @else
      {!! Form::date('fecha_entrega', null, ['class' => 'form-control']) !!}
    @endif
    </div>
</div>

<!-- Fechaa Produccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_produccion', 'Fecha Produccion:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if(isset($pedido) && $pedido->fecha_produccion !== '')
      {!! Form::date('fecha_produccion', $pedido->fecha_produccion, ['class' => 'form-control']) !!}
    @else
      {!! Form::date('fecha_produccion', null, ['class' => 'form-control']) !!}
    @endif
    </div>
</div>

<!-- Fecha Instalacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_instalacion', 'Fecha Instalacion:', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
    @if(isset($pedido) && $pedido->fecha_instalacion !== '')
      {!! Form::date('fecha_instalacion', $pedido->fecha_instalacion, ['class' => 'form-control']) !!}
    @else
      {!! Form::date('fecha_instalacion', null, ['class' => 'form-control']) !!}
    @endif
    </div>
</div>

<!-- Submit Field -->
<div class="bg-default text-center pad20A mrg25T">
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-lg btn-primary']) !!}
    <a href="{!! route('pedidos.index') !!}" class="btn btn-lg btn-default">Cancelar</a>
</div>
</div>


<script type="text/javascript">
$(document).ready(function()
{
    $('#divider1').hide();
    $('#divider2').hide();
    $('#divider3').hide();
    $('#divider4').hide();
    console.log(new Date().getYear(),new Date().getMonth(),new Date().getDate(),new Date().getHours(),new Date().getMinutes(),new Date().getSeconds(),new Date().getUTCMilliseconds());
    var folio=''+new Date().getYear()+''+new Date().getMonth()+''+new Date().getDate()+''+new Date().getHours()+''+new Date().getMinutes()+''+new Date().getSeconds()+''+new Date().getUTCMilliseconds();
    console.log(folio);
    $('#foli_n').val(folio);
});

function misFunction(modelos)
{
  var x = document.getElementById("modelo_id").value;
  var selectList = document.getElementById("color_id");
  //var selectList = document.createElement("select");
  //selectList.id = "mySelect";
  //selectList.className = "form-control";
  //myDiv.appendChild(selectList);
  $('#color_id').empty();
  for (var i = 0; i < modelos.length; i++)
  {
      if(modelos[i].id == x)
      {
        for(var j=0;j<modelos[i].colors.length;j++)
        {
          var option = document.createElement("option");
          option.value = modelos[i].colors[j].id;
          option.text = modelos[i].colors[j].nombre;
          selectList.appendChild(option);
        }
      }
  }
}

function misFun(marcas)
{
  var x = document.getElementById("marca_id").value;
  var selectList = document.getElementById("modelo_id");
  //var selectList = document.createElement("select");
  //selectList.id = "mySelect";
  //selectList.className = "form-control";
  //myDiv.appendChild(selectList);
  $('#modelo_id').empty();
  for (var i = 0; i < marcas.length; i++)
  {
      if(marcas[i].id == x)
      {
        for(var j=0;j<marcas[i].modelos.length;j++)
        {
          var option = document.createElement("option");
          option.value =marcas[i].modelos[j].id;
          option.text = marcas[i].modelos[j].nombre;
          selectList.appendChild(option);
        }
      }
  }
}

function sistema(pos)
{
  var x = document.getElementById("sistema"+pos).value;
  if(x == 'motorizada')
  {
    $('#dtipom'+pos).show();
    $('#dmmotor'+pos).show();
    $('#dlmotor'+pos).show();
    $('#dlado'+pos).hide();
    $('#dacont'+pos).hide();
  }
  if(x == 'manual')
  {
    $('#dtipom'+pos).hide();
    $('#dmmotor'+pos).hide();
    $('#dlmotor'+pos).hide();
    $('#dlado'+pos).show();
    $('#dacont'+pos).show();
  }
}

function cuantas()
{
  console.log($('#noper').val());
  var total=$('#noper').val();
  $('#persianas').empty();
  $('#divider1').show();
  $('#divider2').show();
  $('#divider3').show();
  $('#divider4').show();
  var pers='<option id="ve" value="---">---</option>';
  for(var i=1;i<=total;i++)
  {
    pers+='<option id="ve'+i+'" value="p'+i+'">P'+i+'</option>';
  }
  console.log(pers);
  for(var i=0;i<total;i++)
  {
    $('#persianas').append('<div id="pers'+i+'" class="row"><div class="col-sm-12"><div class="form-group col-sm-1"><label for="alto'+i+'" class="control-label">Alto:</label><div><input class="form-control" name="alto'+i+'" type="text" id="alto'+i+'"></div></div><div class="form-group col-sm-1"><label for="ancho'+i+'" class="control-label">Ancho:</label><div><input class="form-control" name="ancho'+i+'" type="text" id="ancho'+i+'"></div></div><div class="form-group col-sm-1"><label for="sistema'+i+'" class="control-label">Sistema:</label><div class=""><select class="form-control" name="sistema'+i+'" id="sistema'+i+'" onchange="sistema('+i+')"><option value="manual">Manual</option><option value="motorizada">Motorizada</option></select></div></div><div class="form-group col-sm-1" id="dtipom'+i+'"><label for="tipom'+i+'" class="control-label">Tipo Motor:</label><div class=""><select class="form-control" name="tipo_motor'+i+'" id="tipom'+i+'"><option value="---">---</option><option value="fuci">Fuci</option><option value="zomfy">Zomfy</option></select></div></div><div class="form-group col-sm-1" id="dmmotor'+i+'"><label for="mmotor'+i+'" class="control-label">Modelo Motor:</label><div class=""><select class="form-control" name="motor'+i+'" id="mmotor'+i+'"><option value="---">---</option><option value="2 lienzos">2 lienzos</option><option value="3 lienzos">3 lienzos</option></select></div></div><div class="form-group col-sm-1" id="dlmotor'+i+'"><label for="lmotor'+i+'" class="control-label">Lado Motor:</label><div class=""><select class="form-control" name="lado_motor'+i+'" id="lmotor'+i+'"><option value="---">---</option><option value="izquierdo">Izquierdo</option><option value="derecho">Derecho</option><option value="3">Intermedio</option></select></div></div><div class="form-group col-sm-1" id="dlado'+i+'"><label for="lado'+i+'" class="control-label">Lado control:</label><div><select class="form-control" name="control_p'+i+'" id="lado'+i+'"><option value="--">---</option><option value="izquierdo">Izquierdo</option><option value="derecho">Derecho</option></select></div></div><div class="form-group col-sm-1" id="dacont'+i+'"><label for="acont'+i+'" class="control-label">Altura control:</label><div><input class="form-control" name="altura_control'+i+'" type="text" id="acont'+i+'"></div></div><div class="form-group col-sm-1"><label for="fijar'+i+'" class="control-label">Fijar a:</label><div><select class="form-control" name="soporte_u'+i+'" id="fijar'+i+'"><option value="techo">Techo</option><option value="muro">Muro</option></select></div></div><div class="form-group col-sm-1"><label for="marco'+i+'" class="control-label">Marco:</label><div><select class="form-control" name="soporte_m'+i+'" id="marco'+i+'"><option value="dentro">DM</option><option value="fuera">FM</option></select></div></div><div class="form-group col-sm-1"><label for="soporte'+i+'" class="control-label">Soporte:</label><div><select class="form-control" name="soporte'+i+'" id="soporte'+i+'"><option value="1">Independiente</option><option value="2">Con Soporte</option></select></div></div><div class="form-group col-sm-1"><label for="pos'+i+'" class="control-label">Posicion:</label><div><select class="form-control" name="soporte_p'+i+'" id="pos'+i+'"><option value="intermedio">Intermedio</option><option value="lateral">Lateral</option></select></div></div><div class="form-group col-sm-1"><label for="vinculado'+i+'" class="control-label">Vinculado a:</label><div><select class="form-control" name="vinculado'+i+'" id="vinculado'+i+'"></select></div></div></div></div>');
    $('#vinculado'+i).append(pers);
    $('#vinculado'+i+' #ve'+(i+1)).hide();
    if(i != total-1)
    {
      $('#persianas').append('<div class="col s12 divider" style="margin-top:10px; margin-bottom:10px; background:red;"></div>');
    }
    $('#dtipom'+i).hide();
    $('#dmmotor'+i).hide();
    $('#dlmotor'+i).hide();
  }
}
</script>
