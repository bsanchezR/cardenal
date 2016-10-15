
@extends('vistas.panel')

@section('content')
        <div id="page-title">
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('modelos.create') !!}">Nuevo Modelo</a>
            <h2>Modelos</h2>
            <p>Panel de informacion</p>
        </div>
        <!-- <h1 class="pull-left">Usuarios</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('user.create') !!}">Agregar</a> -->

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

                  <div class="panel">
                      <div class="panel-body">
                          <h3 class="title-hero">Listado de Modelos</h3>
                          <div class="example-box-wrapper">
                            <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%" >
                            @include('modelos.table')
                          </table>
                          </div>
                      </div>
                  </div>
@endsection
