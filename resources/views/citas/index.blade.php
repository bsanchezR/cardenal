@extends('vistas.panel')

@section('content')

<script type="text/javascript" src="{{ asset('widgets/interactions-ui/resizable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/draggable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/sortable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/selectable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/daterangepicker/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/calendar/calendar.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/calendar/calendar-demo.js') }}"></script>

<script type="text/javascript" src="{{ asset('widgets/modal/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/resizable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/draggable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/sortable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/selectable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/dialog/dialog.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/dialog/dialog-demo.js') }}"></script>


<script type="text/javascript">
  $(document).ready(function(){
    var resultado;
    var id_seleccion;
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

    $('#btnAsignar').click(function(){
      console.log('vamos asignar');
      var url =  'http://localhost:8000/asignarCita/' + $(".vendedores select").val()+'-'+id_seleccion;

      $.ajax({url: url , success: function(result){
          console.log(result);
          // hacer un redirec
      }});

    });


  });
</script>

        <h1 class="pull-left">citas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('citas.create') !!}">Crear cita</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="panel">
            <div class="panel-body">
                <h3 class="title-hero">Listado de Pedidos</h3>
                <div class="example-box-wrapper">
                  <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%" >
                    @include('citas.table')
                  </table>
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
                        <h4 class="modal-title">Usuario asignado: sacar el vendedor</h4>
                        <br>
                        <label >Seleciona un vendedor</label>
                        <div class="vendedores">

                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default clear" data-action="clear">cancelar  </button>
                    <button type="button" class="btn btn-primary" id="btnAsignar" data-dismiss="modal" href="{!! route('asignar') !!}">asignar cita</button>
                  </div>
                </div>
              </div>
          </div>
        </div>

@endsection
