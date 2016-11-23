

@extends('vistas.panel')

@section('content')
        <div id="page-title">
            <h2>Informacion de Ventas</h2>
            <p>Panel de informacion</p>
        </div>
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

                  <div class="panel">
                      <div class="panel-body">
                          <h3 class="title-hero">Ventas por tienda</h3>
                          <div class="example-box-wrapper">
                            @include('general.table')
                          </div>
                      </div>
                  </div>
@endsection
