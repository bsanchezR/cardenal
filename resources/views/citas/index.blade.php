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


                <button class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Firmar</button>

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
                                  <select class="form-control">
                                    <option value="vendedor">vendedor 1</option>
                                    <option value="vendedor">vendedor 2</option>
                                    <option value="vendedor">Vendedor 3</option>
                                    <option value="vendedor">Vendedor 4</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-default clear" data-action="clear">cancelar  </button>
                              <button type="button" class="btn btn-primary" data-dismiss="modal" href="{!! route('asignar') !!}">asignar sita</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="panel">
            <div class="panel-body">
                <h3 class="title-hero">Basic</h3>
                <div class="example-box-wrapper">
                    <div id="calendar-example-1" class="col-md-10 center-margin"></div>
                </div>
            </div>
        </div>

@endsection
