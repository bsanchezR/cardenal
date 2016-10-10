@extends('layouts.app')

@section('content')

@if (Auth::user()->tipo_usuario === 'vendedor')
<div class=" container">
  <div class="row">
      <div class="col s3 offset-s9">
        <ul class="nav nav-pills" role="tablist">
          <li role="presentation" class="active"><a href="{{ url('/notificacions') }}"> Notificaciones <span class="badge">{{ $nuevas }}</span></a></li>
        </ul>
      </div>
  </div>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <ul>
                      <li class="col s4">
                        <div class="center-align dash-list" type="button">
                          <div class="iconos">
                            <span><a href="{{ url('/productos/create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></span>
                          </div>
                          <a href="{{ url('/productos/create') }}" class="black-text decoration">&nbsp;&nbsp;Agregar<br><small>Producto</small></a>
                        </div>
                      </li>
                      <li class="col s4">
                        <div type="button" class="dash-list center-align">
                          <div class="iconos">
                          <span><a href="{{ url('/user/create') }}"><i class="fa fa-user-plus" aria-hidden="true"></i></a></span>
                          </div>
                          <a href="{{ url('/user/create') }}" class="black-text decoration">&nbsp;&nbsp;Agregar<br><small>Usuario</small></a>
                        </div>
                      </li>
                      <li class="col s4">
                        <div type="button" class="dash-list center-align">
                          <div class="iconos">
                          <span><a href="#!"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></span>
                          </div>
                          <a href="#!" class="black-text decoration">&nbsp;&nbsp;Punto<br><small>de Venta</small></a>
                        </div>
                      </li>
                      <li class="col s4">
                        <div type="button" class="dash-list center-align">
                          <div class="iconos">
                          <span><a href="{{ url('/promocions/create') }}"><i class="fa fa-tags" aria-hidden="true"></i></a></span>
                          </div>
                          <a href="{{ url('/promocions/create') }}" class="black-text decoration">&nbsp;&nbsp;Agregar<br><small>Promociones</small></a>
                        </div>
                      </li>
                      <li class="col s4">
                        <div type="button" class="dash-list center-align">
                          <div class="iconos">
                          <span><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i></a></span>
                          </div>
                          <a href="#!" class="black-text decoration">&nbsp;&nbsp;Reporte<br><small>de Ventas</small></a>
                        </div>
                      </li>
                      <li class="col s4">
                        <div type="button" class="dash-list center-align">
                          <div class="iconos">
                          <span><a href="{{ url('/inventarios') }}"><i class="fa fa-inbox" aria-hidden="true"></i></a></span>
                          </div>
                          <a href="{{ url('/inventarios') }}" class="black-text decoration">&nbsp;&nbsp;Verificar<br><small>stock</small></a>
                        </div>
                      </li>
                      <li class="col s4">
                        <div type="button" class="dash-list center-align">
                          <div class="iconos">
                          <span><a href="{{ url('/clientes') }}"><i class="fa fa-star" aria-hidden="true"></i></a></span>
                          </div>
                          <a href="{{ url('/clientes') }}" class="black-text decoration">&nbsp;&nbsp;Seguimiento<br><small>a clientes</small></a>
                        </div>
                      </li>
                      <li class="col s4">
                        <div type="button" class="dash-list center-align">
                          <div class="iconos">
                          <span><a href="{{ url('/clientes') }}"><i class="fa fa-list" aria-hidden="true"></i></a></span>
                          </div>
                          <a href="{{ url('/clientes') }}" class="black-text decoration">&nbsp;&nbsp;Lista<br><small>de clientes</small></a>
                        </div>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
