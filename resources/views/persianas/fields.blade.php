<!-- Pedido Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pedido_id', 'Numero de Pedido:') !!}
    <select class="form-control" name="pedido_id">
      @foreach($pedidos as $pedido)
        <option value="{{$pedido->id}}">{{$pedido->folio}}</option>
      @endforeach
    </select>
</div>

<!-- Modelo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo_id', 'Modelo:') !!}
    <select class="form-control" name="modelo_id" id="modelo_id" onchange='misFunction({!! $modelos !!})'>
      <option value="">-----</option>
      @foreach($modelos as $model)
        <option value="{{$model->id}}">{{$model->nombre}}</option>
      @endforeach
    </select>
</div>

<!-- Color Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color_id', 'Color:') !!}
    <select class="form-control" name="color_id" id="color_id">
    </select>
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::select('tipo', [''=>'---' , 'enrrollable' => 'Enrrollable', 'vertical' => 'Vertical', 'motorizada' => 'Motorizada', 'japones' => 'Panel Japones'], null, ['class' => 'form-control', 'id' => 'tipos' , 'onchange' => 'mFunction()']) !!}
</div>

<!-- Subtipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtipo', 'Subtipo:') !!}
    {!! Form::select('subtipo', ['enrrollable' => 'Enrrollable', 'sheer' => 'Sheer', 'shangrila' => 'Shangrila', 'fijo' => 'Fijo', 'tela' => 'Tela', 'pbc' => 'PBC', '2vias' => '2 Vias', '3vias' => '3 Vias', '4vias' => '4 Vias', '5vias' => '5 Vias'], null, ['class' => 'form-control', 'id' => 'subtipos']) !!}
</div>

<!-- Control P Field -->
<div class="form-group col-sm-6">
    {!! Form::label('control_p', 'Control P:') !!}
    {!! Form::select('control_p', ['izquierdo' => 'Izquierdo', 'derecho' => 'Derecho'], null, ['class' => 'form-control']) !!}
</div>

<!-- Motor Field -->
<div id="motor" class="form-group col-sm-6 hidden">
    {!! Form::label('motor', 'Motor:') !!}
    {!! Form::select('motor', [' ' => '----' , 'independiente' => 'Independiente', '2 lienzos' => '2 Lienzos', ' 3 lienzos' => ' 3 Lienzos'], null, ['class' => 'form-control', 'id' => 'motor_s']) !!}
</div>

<!-- Soporte U Field -->
<div class="form-group col-sm-6">
    {!! Form::label('soporte_u', 'Soporte U:') !!}
    {!! Form::select('soporte_u', ['techo' => 'Techo', 'muro' => 'Muro'], null, ['class' => 'form-control']) !!}
</div>

<!-- Soporte M Field -->
<div class="form-group col-sm-6">
    {!! Form::label('soporte_m', 'Soporte M:') !!}
    {!! Form::select('soporte_m', ['fuera' => 'Por fuera', 'dentro' => 'Por dentro'], null, ['class' => 'form-control']) !!}
</div>

<!-- Soporte A Field -->
<div class="form-group col-sm-6">
    {!! Form::label('soporte_a', 'Soporte A:') !!}
    {!! Form::select('soporte_a', [' ' => '----' ,'andamio' => 'Andamio', 'escalera' => 'Escalera de extension'], null, ['class' => 'form-control']) !!}
</div>

<!-- Soporte P Field -->
<div class="form-group col-sm-6">
    {!! Form::label('soporte_p', 'Soporte P:') !!}
    {!! Form::select('soporte_p', ['intermedio' => 'Intermedio', 'lateral' => 'Lateral'], null, ['class' => 'form-control']) !!}
</div>
<div class="col s12"></div>
<!-- Area Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('area', 'Area:') !!}
    {!! Form::textarea('area', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Obervaciones Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>


<!-- Alto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alto', 'Alto:') !!}
    {!! Form::number('alto', null, ['class' => 'form-control', 'onchange' => 'malto()' , 'id' => 'alto_medida']) !!}
</div>

<!-- Ancho Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ancho', 'Ancho:') !!}
    {!! Form::number('ancho', null, ['class' => 'form-control', 'onchange' => 'mancho()' , 'id' => 'ancho_medida']) !!}
</div>

<div class="center-align col-sm-12">
    <br>
    <label>
    Posicion en %
    </label>
    <div class="center-align" style="margin-left:30%; max-width: 400px;height: 200px;border-color: grey; border-style: solid;">
        <p class="range-field">
          <input type="range" id="largo" min="0" max="100" style="margin: -3px 0;" onchange='calcular()'/>
        </p>
      <p id="altos" class="left grey-text" style="margin-left:5px; margin-top:20px;"></p>
    </div>
    <p id="anchos" class="center-align grey-text"></p>
    <br>
    <br>
</div>

<!-- Largo Field -->
<div class="form-group col-sm-12">
    {!! Form::label('largo', 'Largo:') !!}
    {!! Form::text('largo', null, ['class' => 'form-control' , 'id' => 'area_obs']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('persianas.index') !!}" class="btn btn-default">Cancelar</a>
</div>

<script type="text/javascript">
  $(document).ready(function() {
      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
      });
      if($('#ancho_medida').val() != '' && $('#ancho_medida').val() != null)
      {
          document.getElementById("anchos").innerHTML= $('#ancho_medida').val()+" mt(s)";
      }
      if($('#alto_medida').val() != '' && $('#alto_medida').val() != null)
      {
          document.getElementById("altos").innerHTML= $('#alto_medida').val()+" mt(s)";
      }
  });
  function misFunction(modelos) {
    var x = document.getElementById("modelo_id").value;
    var selectList = document.getElementById("color_id");
    //var selectList = document.createElement("select");
    //selectList.id = "mySelect";
    //selectList.className = "form-control";
    //myDiv.appendChild(selectList);
    $('#color_id').empty();
    for (var i = 0; i < modelos.length; i++) {
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
  function mancho()
  {
    console.log($('#largo').val());
    document.getElementById("anchos").innerHTML= $('#ancho_medida').val()+" mt(s)";
  }
  function malto()
  {
    document.getElementById("altos").innerHTML= $('#alto_medida').val()+" mt(s)";
  }
  function calcular()
  {
    $('#area_obs').val(' Largo de la tela : '+(($('#largo').val()*$('#ancho_medida').val())/100)+' mt(s)');
  }
  function mFunction() {
    var x = document.getElementById("tipos").value;
    var selectList = document.getElementById("subtipos");
    $('#subtipos').empty();
    switch(x)
    {
        case 'enrrollable':
            var option = document.createElement("option");
            option.value = 'enrrollable';
            option.text = 'Enrrollable';
            selectList.appendChild(option);
            option = document.createElement("option");
            option.value = 'sheer';
            option.text = 'Shher';
            selectList.appendChild(option);
            option = document.createElement("option");
            option.value = 'shangrila';
            option.text = 'Shangrila';
            selectList.appendChild(option);
            option = document.createElement("option");
            option.value = 'fijo';
            option.text = 'Fijo';
            selectList.appendChild(option);
            $('#motor').removeClass('show');
            $('#motor').addClass('hidden');
            var country = document.getElementById("motor_s");
            country.options[0].selected = true;
            break;
        case 'vertical':
            var option = document.createElement("option");
            option.value = 'tela';
            option.text = 'Tela';
            selectList.appendChild(option);
            option = document.createElement("option");
            option.value = 'pbc';
            option.text = 'PBC';
            selectList.appendChild(option);
            $('#motor').removeClass('show');
            $('#motor').addClass('hidden');
            var country = document.getElementById("motor_s");
            country.options[0].selected = true;
            break;
        case 'motorizada':
            var option = document.createElement("option");
            option.value = 'enrrollable';
            option.text = 'Enrrollable';
            selectList.appendChild(option);
            option = document.createElement("option");
            option.value = 'sheer';
            option.text = 'Shher';
            selectList.appendChild(option);
            option = document.createElement("option");
            option.value = 'shangrila';
            option.text = 'Shangrila';
            selectList.appendChild(option);
            $('#motor').removeClass('hidden');
            $('#motor').addClass('show');
            break;
        case 'japones':
            var option = document.createElement("option");
            option.value = '2vias';
            option.text = '2 Vias';
            selectList.appendChild(option);
            option = document.createElement("option");
            option.value = '3vias';
            option.text = '3 Vias';
            selectList.appendChild(option);
            option = document.createElement("option");
            option.value = '4vias';
            option.text = '4 Vias';
            selectList.appendChild(option);
            option = document.createElement("option");
            option.value = '5vias';
            option.text = '5 Vias';
            selectList.appendChild(option);
            $('#motor').removeClass('show');
            $('#motor').addClass('hidden');
            var country = document.getElementById("motor_s");
            country.options[0].selected = true;
            break;
    }
  }
</script>
