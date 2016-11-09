
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



        <h1 class="pull-left">Cupones</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cupons.create') !!}">Nuevo Cupón</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('cupons.table')


        <button class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Usar cupón</button>

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
                        <div class="row">
                                <div class="form-group col-sm-12">
                                    {!! Form::label('codigo', 'Ingresa Codigo:') !!}
                                    {!! Form::number('text', null, ['class' => 'form-control']) !!}
                                </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default clear" data-action="clear">cancelar  </button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" href="{!! route('asignar') !!}">Usar Cupón en este pedido</button>
                    </div>
                      
                  </div>
                </div>
            </div>
        </div>

@endsection
