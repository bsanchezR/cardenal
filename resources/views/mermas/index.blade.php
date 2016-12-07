@extends('vistas.panel')

@section('content')

        <div id="page-title">
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('mermas.create') !!}">Nuevo Articulo</a>
            <h2>Merma</h2>
            <p>Panel de informacion</p>
        </div>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="panel">
            <div class="panel-body">
                <h3 class="title-hero">Listado de Articulos</h3>
                <div class="example-box-wrapper">
                  <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%" >
                  @include('mermas.table')
                </table>
                </div>
            </div>
        </div>

@endsection
