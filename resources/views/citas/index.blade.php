@extends('vistas.panel')

@section('content')

<script type="text/javascript" src="{{ asset('widgets/interactions-ui/resizable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/draggable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/sortable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/selectable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/daterangepicker/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/calendar/calendar.js') }}"></script>


<script type="text/javascript" src="{{ asset('widgets/modal/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/resizable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/draggable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/sortable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/selectable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/dialog/dialog.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/dialog/dialog-demo.js') }}"></script>


<script type="text/javascript">
$(document).ready(function(){
  $('#loader').hide();
  var resultado;
  var id_seleccion;
  var total = {!! $citas !!};
  //console.log(total);
  $('.asignar').click(function(){
    id_seleccion =  $(this).attr('data-id');
    var url = "http://localhost:8000/vendedoresSinCita/" + id_seleccion;
    console.log(url);
    $.ajax({url: url , success: function(result){
        console.log(result);

        if(result.length > 0){
          var selectVendedores = '<select class="form-control">';

          for (var i = 0; i < result.length; i++) {
              selectVendedores += '<option value="'+result[i].id+'"> '+result[i].name +'</option>';
            console.log(result[i].name);
            console.log(result[i]);
          }
          selectVendedores += '</select>';

          $(".vendedores").html(selectVendedores);
        }
        else{
          $(".vendedores").html('No hay vendedores disponibles');
        }
    }});
  });

    $('#hecho_cita').click(function()
    {
      $('#loader').show();
      var id=$('#cita_id').html();
      console.log(id);
      var url =  'http://localhost:8000/hechoCita/'+id;
      window.location.href= url;
    });

    $('#error_cita').click(function()
    {
      $('#comentarios').show();
    });

    $('#cancela_envio').click(function()
    {
      $('#caja_notas').val('');
      $('#comentarios').hide();
    });

    $('#envio').click(function()
    {
      $('#loader').show();
      var id=$('#cita_id').html()+'@'+$('#caja_notas').val();;
      console.log(id);
      var url =  'http://localhost:8000/errorCita/'+id;
      window.location.href= url;
    });

  $('#btnAsignar').click(function(){
    console.log('vamos asignar');
    var url =  'http://localhost:8000/asignarCita/' + $(".vendedores select").val()+'-'+id_seleccion;
    $('#loader').show();
    $.ajax({url: url , success: function(result){
        console.log(result);
        // hacer un redirec
        window.location.href="{!! route('citas.index') !!}";
    }});

  });
  var  citas = [
    {
      title: 'Event1',
      start: '2016-11-04',
      id: 1
    },
    {
      title: 'Event2',
      start: '2016-11-05',
      id: 2
    }
  ];

  $("#calendar-example-1").fullCalendar( {
        // put your options and callbacks here
        events: citas,
        header: {
            left: "prev,next today", center: "title", right: "month,agendaWeek,agendaDay"
        },
        eventClick: function(calEvent, jsEvent, view) {
          $('#cita_id').html(calEvent.id);
          $('#hecho_cita').show();
          $('#error_cita').show();
          $('#botones').show();
          $('#comentarios').hide();
          $('#obs').show();
          $('#cliente').html('<b style="font-size:19px;">Cliente:</b> '+calEvent.cliente);
          $('#vendedor').html('<b style="font-size:19px;">Vendedor:</b> '+calEvent.vendedor);
          $('#direccion').html('<b style="font-size:19px;">Direccion:</b> '+calEvent.direccion);
          $('#hora').html('<b style="font-size:19px;">Fecha:</b> '+calEvent.start._i);
          console.log(calEvent.color);
          if(calEvent.vendedor == 'Sin asignar')
          {
            $('#hecho_cita').hide();
            $('#error_cita').hide();
          }
          if(calEvent.color == '#2c8235' || calEvent.color == '#e21c1c')
          {
            $('#botones').hide();
            $('#obs').html('<b style="font-size:19px;">Notas:</b> '+calEvent.notas);
          }
          else
          {
            $('#obs').hide();
          }
          $('#estado').modal()
          //alert('Cita: ' + calEvent.title+'\nInicia: '+calEvent.start._i+'\nVendedor asignado: '+calEvent.vendedor);
          console.log(calEvent,calEvent.start._i)
          //alert('Event: ' + calEvent.id);
         }
    });

     $( "#listaVendedores" ).change(function () {
          console.log($(this).val());
          if($(this).val() != 'total')
          {
            var url = "http://localhost:8000//vendedorCitas/"+$(this).val();
            console.log(url);
            $.ajax({url: url , success: function(result){

              //console.log(result[0].fecha);
              console.log('-->',result,result[0].fecha.split(' ')[0]+' '+result[0].hora);

              citas = [];

              for (var i = 0; i < result.length; i++) {

                if(result[i].user != null)
                {
                  if(result[i].completado == 'hecho')
                  {
                    var cita = {id:result[i].id,  title : 'Cita # '+result[i].id, start: result[i].fecha.split(' ')[0]+' '+result[i].hora,rendering:'background', color:'#2c8235', vendedor: result[i].user.name , cliente: result[i].cliente.nombre, direccion: result[i].cliente.direccion, notas: result[i].notas }
                  }
                  if(result[i].completado == 'error')
                  {
                    var cita = {id:result[i].id,  title : 'Cita # '+result[i].id, start: result[i].fecha.split(' ')[0]+' '+result[i].hora,rendering:'background', color:'#e21c1c', vendedor: result[i].user.name, cliente: result[i].cliente.nombre, direccion: result[i].cliente.direccion, notas: result[i].notas }
                  }
                  if(result[i].completado == 'falta')
                  {
                    var cita = {id:result[i].id,  title : 'Cita # '+result[i].id, start: result[i].fecha.split(' ')[0]+' '+result[i].hora,rendering:'background', color:'#1cb3e2', vendedor: result[i].user.name, cliente: result[i].cliente.nombre, direccion: result[i].cliente.direccion, notas: result[i].notas }
                  }
                  if(result[i].completado == 'asignar')
                  {
                    var cita = {id:result[i].id,  title : 'Cita # '+result[i].id, start: result[i].fecha.split(' ')[0]+' '+result[i].hora,rendering:'background', color:'#dcb900', vendedor: result[i].user.name, cliente: result[i].cliente.nombre, direccion: result[i].cliente.direccion, notas: result[i].notas }
                  }
                }
                else
                {
                  var cita = {id:result[i].id,  title : 'Cita # '+result[i].id, start: result[i].fecha.split(' ')[0]+' '+result[i].hora, rendering:'background', color:'#b3b3b3', vendedor:'Sin asignar', cliente: result[i].cliente.nombre, direccion: result[i].cliente.direccion, notas: result[i].notas }
                }
                citas.push(cita);
              }

              $("#calendar-example-1").fullCalendar('removeEvents');
              $("#calendar-example-1").fullCalendar('addEventSource', citas);
            }});
          }
          else
          {
            var citas = [];
            for (var i = 0; i < total.length; i++)
            {
              if(total[i].user != null)
              {
                if(total[i].completado == 'hecho')
                {
                  var cita = {id:total[i].id,  title : 'Cita # '+total[i].id, start: total[i].fecha.split(' ')[0]+' '+total[i].hora,rendering:'background', color:'#2c8235', vendedor: total[i].user.name, cliente: total[i].cliente.nombre, direccion: total[i].cliente.direccion, notas: total[i].notas }
                }
                if(total[i].completado == 'error')
                {
                  var cita = {id:total[i].id,  title : 'Cita # '+total[i].id, start: total[i].fecha.split(' ')[0]+' '+total[i].hora,rendering:'background', color:'#e21c1c', vendedor: total[i].user.name, cliente: total[i].cliente.nombre, direccion: total[i].cliente.direccion, notas: total[i].notas }
                }
                if(total[i].completado == 'falta')
                {
                  var cita = {id:total[i].id,  title : 'Cita # '+total[i].id, start: total[i].fecha.split(' ')[0]+' '+total[i].hora,rendering:'background', color:'#1cb3e2', vendedor: total[i].user.name, cliente: total[i].cliente.nombre, direccion: total[i].cliente.direccion, notas: total[i].notas }
                }
                if(total[i].completado == 'asignar')
                {
                  var cita = {id:total[i].id,  title : 'Cita # '+total[i].id, start: total[i].fecha.split(' ')[0]+' '+total[i].hora,rendering:'background', color:'#dcb900', vendedor: total[i].user.name,  cliente: total[i].cliente.nombre, direccion: total[i].cliente.direccion, notas: total[i].notas }
                }
              }
              else
              {
                var cita = {id:total[i].id,  title : 'Cita # '+total[i].id, start: total[i].fecha.split(' ')[0]+' '+total[i].hora, rendering:'background', color:'#b3b3b3', vendedor:'Sin asignar',  cliente: total[i].cliente.nombre, direccion: total[i].cliente.direccion, notas: total[i].notas }
              }
              citas.push(cita);
              // console.log(total[i].user.name);
            }
            $("#calendar-example-1").fullCalendar('removeEvents');
            $("#calendar-example-1").fullCalendar('addEventSource', citas);
          }
       });



    //    console.log($("#listaVendedores").val());
    //    var url = "http://localhost:8000//vendedorCitas/"+$("#listaVendedores").val();
    //    console.log(url);
    //    $.ajax({url: url , success: function(result){
     //
    //      //console.log(result[0].fecha);
    //      console.log(result);
     //
    //      citas = [];
     //
    //      for (var i = 0; i < result.length; i++) {
    //        var cita = {id:result[i].id,  title : result[i].titulo, start: result[i].fecha.split(' ')[0]+' '+result[i].hora,  }
    //        citas.push(cita);
    //      }
     //
    //    $("#calendar-example-1").fullCalendar('removeEvents');
    //    $("#calendar-example-1").fullCalendar('addEventSource', citas);
    //  }});
    var citas = [];
    for (var i = 0; i < total.length; i++)
    {
      if(total[i].user != null)
      {
        if(total[i].completado == 'hecho')
        {
          var cita = {id:total[i].id,  title : 'Cita # '+total[i].id, start: total[i].fecha.split(' ')[0]+' '+total[i].hora,rendering:'background', color:'#2c8235', vendedor: total[i].user.name,  cliente: total[i].cliente.nombre, direccion: total[i].cliente.direccion, notas: total[i].notas }
        }
        if(total[i].completado == 'error')
        {
          var cita = {id:total[i].id,  title : 'Cita # '+total[i].id, start: total[i].fecha.split(' ')[0]+' '+total[i].hora,rendering:'background', color:'#e21c1c', vendedor: total[i].user.name,  cliente: total[i].cliente.nombre, direccion: total[i].cliente.direccion, notas: total[i].notas }
        }
        if(total[i].completado == 'falta')
        {
          var cita = {id:total[i].id,  title : 'Cita # '+total[i].id, start: total[i].fecha.split(' ')[0]+' '+total[i].hora,rendering:'background', color:'#1cb3e2', vendedor: total[i].user.name,  cliente: total[i].cliente.nombre, direccion: total[i].cliente.direccion, notas: total[i].notas }
        }
        if(total[i].completado == 'asignar')
        {
          var cita = {id:total[i].id,  title : 'Cita # '+total[i].id, start: total[i].fecha.split(' ')[0]+' '+total[i].hora,rendering:'background', color:'#dcb900', vendedor: total[i].user.name,  cliente: total[i].cliente.nombre, direccion: total[i].cliente.direccion, notas: total[i].notas }
        }
      }
      else
      {
        var cita = {id:total[i].id,  title : 'Cita # '+total[i].id, start: total[i].fecha.split(' ')[0]+' '+total[i].hora, rendering:'background', color:'#b3b3b3', vendedor:'Sin asignar',  cliente: total[i].cliente.nombre, direccion: total[i].cliente.direccion, notas: total[i].notas }
      }
      citas.push(cita);
      // console.log(total[i].user.name);
    }
  $("#calendar-example-1").fullCalendar('removeEvents');
  $("#calendar-example-1").fullCalendar('addEventSource', citas);
});
</script>

      <h1 class="pull-left">Citas</h1>
      @if(Auth::user()->tipo_usuario === 'administrador')
      <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('citas.create') !!}">Crear cita</a>
      @endif

      <div class="clearfix"></div>

      @include('flash::message')

      <div class="clearfix"></div>
      @if(Auth::user()->tipo_usuario === 'administrador' || Auth::user()->tipo_usuario === 'admin')
      <div class="panel">
          <div class="panel-body">
              <h3 class="title-hero">Listado de Citas</h3>
              <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%" >
                  @include('citas.table')
                </table>
              </div>
          </div>
      </div>
      @endif

      <div class="panel">
          <div class="panel-body">
            <div class="form-group col-sm-6">
              @if(Auth::user()->tipo_usuario === 'administrador')
                <select class="form-control" name="cliente_id" id="listaVendedores">
                    <option value="total">Total</option>
                  @foreach($vendedores as $vendedor)
                    <option value="{!! $vendedor->id !!}"> {!! $vendedor->name !!}</option>
                  @endforeach
                </select>
              @else
                <select class="form-control" name="cliente_id" id="listaVendedores">
                    <option value="{!! Auth::user()->id !!}"> {!! Auth::user()->name !!}</option>
                </select>
              @endif
            </div>
            <br>
            <br>
              <div class="example-box-wrapper">
                  <div id="calendar-example-1" class="col-md-10 center-margin"></div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Selecciona el usuario</h4>
              </div>
              <div id="signature-pad" class="m-signature-pad">
                <div class="modal-body">
                  <div class="m-signature-pad--body">
                    <div class="muestra">
                      <label >Seleciona un vendedor</label>
                      <div class="vendedores">

                      </div>

                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default clear" data-action="clear" data-dismiss="modal">cancelar  </button>
                  <button type="button" class="btn btn-primary" id="btnAsignar" data-dismiss="modal">asignar cita</button>
                </div>
              </div>
            </div>
        </div>
      </div>

      <div class="modal fade" id="estado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Informacion de la cita</h3>
              </div>
              <div id="signature-pad" class="m-signature-pad">
                <div class="modal-body">
                  <div class="m-signature-pad--body">
                    <div class="muestra">
                      <h4 class="modal-title" id="cliente"></h4><br>
                      <h4 class="modal-title" id="direccion"></h4><br>
                      <h4 class="modal-title" id="hora"></h4><br>
                      <h4 class="modal-title" id="vendedor"></h4><br>
                      <h4 class="modal-title hidden" id="cita_id"></h4>
                      <h5 id="obs"></h5>
                    </div>
                  </div>
                </div>
                <div class="modal-footer" id="botones">
                  <button type="button" class="btn btn-default clear" data-action="clear" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-success clear" data-action="clear" id="hecho_cita">Hecho</button>
                  <button type="button" class="btn btn-danger clear" data-action="clear" id="error_cita">Fallo</button>
                  <div id="comentarios" style="text-align:left;">
                    <h4>Razon</h4>
                    <div>
                      {!! Form::textarea(null, null, ['class' => 'form-control', 'id'=>'caja_notas']) !!}
                    </div>
                    <button type="button" class="btn btn-default clear" data-action="clear" id="envio">Enviar</button>
                    <button type="button" class="btn btn-default clear" data-action="clear" id="cancela_envio">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>

<span id="loader"><p><img src="{{asset('images/svg-loaders/ball-triangle.svg')}}" alt="Cargando ..." /></p></span>

@endsection
