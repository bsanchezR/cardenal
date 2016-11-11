
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
    $("#usar").click(function(){
      var url = "http://localhost:8000/usar/" + $('#codigo').val();
       $.ajax({url: url , success: function(result){
           if(result != ''){
              setTimeout(respuesta, 1000);
              $('#respuesta').html('El codigo es correcto');
           }
           else{
              $('#respuesta').html('El codigo no fue encontrado');
           }
       }});

    });

    function respuesta(){
      $('#boton3').click();
    }
  });
</script>

        <h1 class="pull-left">Cupones</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cupons.create') !!}">Nuevo Cupón</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('cupons.table')


        <button id="boton"  class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Usar cupón</button>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Ingresa tu codigo</h4>
                  </div>
                  <div id="signature-pad" class="m-signature-pad">

                    <div class="modal-body">
                      <div class="m-signature-pad--body">
                        <div class="row">
                                <div class="form-group col-sm-12">
                                    {!! Form::label('codigo', 'Codigo:') !!}
                                    {!! Form::number('text', null, ['class' => 'form-control', 'id' => 'codigo']) !!}
                                </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default clear" data-action="clear">cancelar  </button>
                      <a type="button" class="btn btn-primary" data-dismiss="modal" id="usar">Usar Cupón en este pedido</a>
                    </div>

                  </div>
                </div>
            </div>
        </div>



        <button id="boton3" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal2" style="display:none">Usar cupón</button>

        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Mensaje</h4>
                  </div>
                  <div id="signature-pad" class="m-signature-pad">
                    <div class="modal-body">
                      <div class="m-signature-pad--body">
                        <div class="row">
                                <div class="form-group col-sm-12">
                                    <h3 id="respuesta"></h3>
                                </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
<div class="" id="div1">

</div>
@endsection
