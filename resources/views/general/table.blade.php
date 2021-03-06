  <link rel="stylesheet" type="text/css" href="{{ asset('widgets/c3.css') }}">
  <script type="text/javascript" src="{{ asset('widgets/accordion-ui/accordion.js') }}"></script>
  <div id="chart" class="c3" style="max-height: 280px; position: relative;"></div>
  <div class="row">
    <div class="col-xs-6">
        <div id="chart1" class="c3" style="max-height: 280px; position: relative;"></div>
    </div>
    <div class="col-xs-6">
      <div id="chart2" class="c3" style="max-height: 280px; position: relative;"></div>
    </div>
  </div>
<?php
  $fila=[];
  $columna=[];
  $i=0;
  $j=0;
  $tie=0;
  $total_mes=[];
  $total_tres=[];
  $mes_actual=[];
  $tres_meses=[];
?>

@foreach($tienda as $actual)
  <?php
    $total=0;
  ?>

  <?php
    $j=0;
    $fila=[];
    $fila[$j]=$actual->nombre;
    $j++;
    $mes_actual[0]=$actual->nombre;
    $tres_meses[0]=$actual->nombre;
    $mes_actual[1]=0;
    $tres_meses[1]=0;
  ?>

  @foreach($meses as $uno)
      @if($uno->tienda_id == $actual->id)
        <?php $tres_meses[1]=$tres_meses[1]+$uno->total ?>
      @endif
  @endforeach

  <?php
    $total_tres[]= $tres_meses[0].'@'.$tres_meses[1];
  ?>

  @foreach($mes as $uno)
      @if($uno->tienda_id == $actual->id)
        <?php $mes_actual[1]=$mes_actual[1]+$uno->total ?>
      @endif
  @endforeach

  <?php
    $total_mes[]= $mes_actual[0].'@'.$mes_actual[1];
  ?>


  <div class="panel-group" id="accordion">
    <div class="panel">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="collapsable.html#tienda{!!$actual->id!!}" class="collapsed">
            {!!$actual->nombre!!}
          </a>
        </h4>
      </div>
      <div id="tienda{!!$actual->id!!}" class="panel-collapse collapse" style="height: 0px;">
        <div class="panel-body">
          <table class="table mrg20T table-hover">
            <thead>
              <tr>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
            @foreach($actual->pedidos as $cada)
            <tr>
              <td>{{$cada->folio}}</td>
              <td>{{$cada->cliente->nombre}}</td>
              <td>{{$cada->fecha_pedido}}</td>
              <td>$ {{$cada->total}}</td>
              <?php
                $total=$total + $cada->total;
                $fila[$j]=$cada->total;
                $j++;
              ?>
            @endforeach
            <?php
              $columna[$i]=$fila;
              $i++;
            ?>
            <tr class="font-bold font-black">
              <td colspan="3" class="text-right">
                TOTAL:
              </td>
              <td colspan="3" class="font-blue font-size-23">
                $ {!! $total !!}
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


@endforeach
    <script type="text/javascript" src="{{ asset('widgets/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('widgets/c3.min.js') }}"></script>
<script>
  //console.log(<?php echo json_encode($columna); ?>);

  var datos= <?php echo json_encode($columna); ?>;
  var mes= <?php echo json_encode($total_mes); ?>;
  var tres= <?php echo json_encode($total_tres); ?>;
  console.log(mes,tres);
  //console.log(datos.length,datos[0].length);
  var titulos=[];
  var numeros=[];
  var final=[];
  var actual=[];
  var meses=[];
  for(var i=0;i<datos.length;i++)
  {
    var fila=[];
    numeros[i]=0;
    for(var j=0;j<datos[i].length;j++)
    {
      if(j == 0)
      {
        titulos.push(datos[i][j]);
        fila.push(datos[i][j]);
      }
      else
      {
        numeros[i]=numeros[i]+parseInt(datos[i][j]);
      }
    }
    fila.push(numeros[i]);
    final.push(fila);
  }
  for(var i=0;i<mes.length;i++)
  {
    actual.push(mes[i].split("@"));
    meses.push(tres[i].split("@"));
  }
  console.log(actual,meses);
  // console.log(titulos,numeros,final);

  $(document).ready(function()
  {

    //   var chart = c3.generate({
    //     bindto: '#chart',
    //     data: {
    //       columns: [
    //         ['data1', 30, 200, 100, 400, 150, 250],
    //         ['data2', 50, 20, 10, 40, 15, 25]
    //       ]
    //     }
    //   });

  var chart = c3.generate({
      data: {
          columns: final,
          type : 'donut',
          onclick: function (d, i) { /*console.log("onclick", d, i);*/ },
          onmouseover: function (d, i) { /*console.log("onmouseover", d, i);*/ },
          onmouseout: function (d, i) { /*console.log("onmouseout", d, i);*/ }
      },
      donut: {
          title: "Porcentaje de ventas"
      }
  });

  setTimeout(function () {
      chart.load({
          columns: final
      });
  }, 1500);


  var chart1 = c3.generate({
      bindto: '#chart1',
      data: {
          columns: actual,
          type : 'donut',
          onclick: function (d, i) { /*console.log("onclick", d, i);*/ },
          onmouseover: function (d, i) { /*console.log("onmouseover", d, i);*/ },
          onmouseout: function (d, i) { /*console.log("onmouseout", d, i);*/ }
      },
      donut: {
          title: "Ultimo mes"
      }
  });

  setTimeout(function () {
      chart1.load({
          columns: actual
      });
  }, 1500);


  var chart2 = c3.generate({
      bindto: '#chart2',
      data: {
          columns: meses,
          type : 'donut',
          onclick: function (d, i) { /*console.log("onclick", d, i);*/ },
          onmouseover: function (d, i) { /*console.log("onmouseover", d, i);*/ },
          onmouseout: function (d, i) { /*console.log("onmouseout", d, i);*/ }
      },
      donut: {
          title: "Ultimos tres meses"
      }
  });

  setTimeout(function () {
      chart2.load({
          columns: meses
      });
  }, 1500);


  });


</script>
