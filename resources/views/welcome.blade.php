<!-- <div class="row">
  <div class="col-md-6">
    <div class="tile-box tile-box-alt mrg20B bg-green">
      <div class="tile-header">New Visitors</div>
      <div class="tile-content-wrapper">
        <i class="glyph-icon icon-dashboard"></i>
        <div class="tile-content">
          <span>$</span> 378
        </div>
        <small><i class="glyph-icon icon-caret-up"></i> +7,6% new users in the first quarter</small>
      </div>
      <a href="index-alt.html#" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="This is a link example!">view details <i class="glyph-icon icon-arrow-right"></i></a>
    </div>
  </div>
</div> -->


@extends('vistas.panel')

@section('content')


<div class="container">
  <div class="row">
    @if (Auth::user() == null)
    <div class="col-md-12" style="margin-top:100px;">
      <div class="tile-box tile-box-alt mrg20B bg-green">
        <div class="tile-header">Login</div>
        <div class="tile-content-wrapper">
          <i class="glyph-icon icon-unlock-alt"></i>
          <div class="tile-content">
            <br>
          </div>
          <small>Inicia sesion para acceder al panel</small>
        </div>
        <a href="{!! route('login') !!}" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="Ir a Login">Ver detalles <i class="glyph-icon icon-arrow-right"></i></a>
      </div>
    </div>
    @else
    @if(Auth::user()->tipo_usuario === 'administrador' || Auth::user()->tipo_usuario === 'admin')
    <div class="col-md-4">
      <div class="tile-box tile-box-alt mrg20B bg-green">
        <div class="tile-header">Ventas</div>
        <div class="tile-content-wrapper">
          <i class="glyph-icon icon-calculator"></i>
          <div class="tile-content">
            <br>
          </div>
          <small>Informacion de las ultimas ventas</small>
        </div>
        <a href="{!! route('general.index') !!}" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="Ir a Ventas">Ver detalles <i class="glyph-icon icon-arrow-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="tile-box tile-box-alt mrg20B bg-blue-alt">
        <div class="tile-header">Tiendas</div>
        <div class="tile-content-wrapper">
          <i class="glyph-icon icon-location-arrow"></i>
          <div class="tile-content">
            <br>
          </div>
          <small>Listado de las tiendas RAMAVE</small>
        </div>
        <a href="{!! route('tienda.index') !!}" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="Ir a Tiendas">Ver detalles <i class="glyph-icon icon-arrow-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="tile-box tile-box-alt mrg20B bg-red">
        <div class="tile-header">Usuarios</div>
        <div class="tile-content-wrapper">
          <i class="glyph-icon icon-user"></i>
          <div class="tile-content">
            <br>
          </div>
          <small>Listado de usuarios en el sistema</small>
        </div>
        <a href="{!! route('user.index') !!}" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="Ir a Usuarios">Ver detalles <i class="glyph-icon icon-arrow-right"></i></a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="tile-box tile-box-alt mrg20B bg-red">
        <div class="tile-header">Citas</div>
        <div class="tile-content-wrapper">
          <i class="glyph-icon icon-calendar"></i>
          <div class="tile-content">
            <br>
          </div>
          <small>Creacion y asignacion de citas</small>
        </div>
        <a href="{!! route('citas.index') !!}" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="Ir a Citas">Ver detalles <i class="glyph-icon icon-arrow-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="tile-box tile-box-alt mrg20B bg-green">
        <div class="tile-header">Clientes</div>
        <div class="tile-content-wrapper">
          <i class="glyph-icon icon-users"></i>
          <div class="tile-content">
            <br>
          </div>
          <small>Administracion de los clientes</small>
        </div>
        <a href="{!! route('cliente.index') !!}" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="Ir a Clientes">Ver detalles <i class="glyph-icon icon-arrow-right"></i></a>
      </div>
  </div>
  <div class="col-md-4">
    <div class="tile-box tile-box-alt mrg20B bg-blue-alt">
      <div class="tile-header">Cupones</div>
      <div class="tile-content-wrapper">
        <i class="glyph-icon icon-money"></i>
        <div class="tile-content">
          <br>
        </div>
        <small>Creacion de cupones de descuento</small>
      </div>
      <a href="{!! route('cupons.index') !!}" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="Ir a Cupones">Ver detalles <i class="glyph-icon icon-arrow-right"></i></a>
    </div>
  </div>
  @endif
  @if(Auth::user()->tipo_usuario === 'administrador' || Auth::user()->tipo_usuario === 'admin' || Auth::user()->tipo_usuario === 'vendedor')
  <div class="col-md-4">
    <div class="tile-box tile-box-alt mrg20B bg-blue-alt">
      <div class="tile-header">Pedidos</div>
      <div class="tile-content-wrapper">
        <i class="glyph-icon icon-pencil"></i>
        <div class="tile-content">
          <br>
        </div>
        <small>Administracion de cotizaciones y pedidos</small>
      </div>
      <a href="{!! route('pedidos.index') !!}" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="Ir a Pedidos">Ver detalles <i class="glyph-icon icon-arrow-right"></i></a>
    </div>
  </div>
  @endif
  @if(Auth::user()->tipo_usuario === 'administrador' || Auth::user()->tipo_usuario === 'admin' || Auth::user()->tipo_usuario === 'productor')
  <div class="col-md-4">
    <div class="tile-box tile-box-alt mrg20B bg-red">
      <div class="tile-header">Produccion</div>
      <div class="tile-content-wrapper">
        <i class="glyph-icon icon-briefcase"></i>
        <div class="tile-content">
          <br>
        </div>
        <small>Informacion de los pedidos en produccion</small>
      </div>
      <a href="{!! route('produccion.index') !!}" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="Ir a Produccion">Ver detalles <i class="glyph-icon icon-arrow-right"></i></a>
    </div>
  </div>
  @endif
  @if(Auth::user()->tipo_usuario === 'administrador' || Auth::user()->tipo_usuario === 'admin' || Auth::user()->tipo_usuario === 'instalador')
    <div class="col-md-4">
      <div class="tile-box tile-box-alt mrg20B bg-green">
        <div class="tile-header">Instalacion</div>
        <div class="tile-content-wrapper">
          <i class="glyph-icon icon-tasks"></i>
          <div class="tile-content">
            <br>
          </div>
          <small>Listado de las instalaciones</small>
        </div>
        <a href="{!! route('instalacion.index') !!}" class="tile-footer tooltip-button" data-placement="bottom" title="" data-original-title="Ir a Instalacion">Ver detalles <i class="glyph-icon icon-arrow-right"></i></a>
      </div>
    </div>
    @endif
  @endif
</div>
</div>
@endsection
