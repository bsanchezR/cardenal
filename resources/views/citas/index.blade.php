@extends('vistas.panel')





@section('content')

<script type="text/javascript" src="{{ asset('widgets/interactions-ui/resizable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/draggable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/sortable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/interactions-ui/selectable.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/daterangepicker/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/calendar/calendar.js') }}"></script>
<script type="text/javascript" src="{{ asset('widgets/calendar/calendar-demo.js') }}"></script>

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

        <div class="panel">
            <div class="panel-body">
                <h3 class="title-hero">Basic</h3>
                <div class="example-box-wrapper">
                    <div id="calendar-example-1" class="col-md-10 center-margin"></div>
                </div>
            </div>
        </div>

@endsection
