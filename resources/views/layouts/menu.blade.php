<li>
    <a href="{{ url('/home') }}">
        <i class="fa fa-tachometer" aria-hidden="true" style="font-size:12px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard
    </a>
</li>
<ul class="collapsible collapsible-accordion">
  <li>
    <a class="collapsible-header">Inventario<i class="fa fa-th-list" aria-hidden="true"></i></a>
    <div class="collapsible-body">
      <ul>
        <li><a href="{{ url('/productos') }}">Productos</a></li>
        <li><a href="{{ url('/categorias') }}">Categorias</a></li>
        <li><a href="#!">Suministros</a></li>
        <li><a href="{{ url('/proveedors') }}">Proveedores</a></li>
        <li><a href="{{ url('/promocions') }}">Promociones</a></li>
      </ul>
    </div>
  </li>
</ul>
<ul class="collapsible collapsible-accordion">
  <li>
    <a class="collapsible-header">Punto de Venta<i class="fa fa-play-circle" aria-hidden="true"></i></a>
    <div class="collapsible-body">
      <ul>
        <li><a href="#!">Pedidos</a></li>
        <li><a href="{{ url('/cotejoCajas') }}">Arqueo de Caja</a></li>
        <li><a href="{{ url('/corteCajas') }}">Corte de Caja</a></li>
        <li><a href="#!">Reportes</a></li>
      </ul>
    </div>
  </li>
</ul>
<ul class="collapsible collapsible-accordion">
  <li>
    <a class="collapsible-header">Vendedores<i class="fa fa-pencil" aria-hidden="true"></i></a>
    <div class="collapsible-body">
      <ul>
        <li><a href="#!">Ejecutivos</a></li>
        <li><a href="{{ url('/ventasProductos') }}">Ventas</a></li>
        <li><a href="#!">Comisiones</a></li>
        <li><a href="{{ url('/notificacions') }}">Notificaciones</a></li>
        <li><a href="#!">Reporte de Ventas</a></li>
      </ul>
    </div>
  </li>
</ul>
<ul class="collapsible collapsible-accordion">
  <li>
    <a class="collapsible-header">Clientes<i class="fa fa-globe" aria-hidden="true"></i></a>
    <div class="collapsible-body">
      <ul>
        <li><a href="{{ url('/clientes') }}">Lista de Clientes</a></li>
        <li><a href="{{ url('/productoCotizacions') }}">Cotizaciones</a></li>
        <li><a href="#!">Seguimiento</a></li>
        <li><a href="#!">Boletin</a></li>
        <li><a href="#!">Reporte de Clientes</a></li>
      </ul>
    </div>
  </li>
</ul>
<ul class="collapsible collapsible-accordion">
  <li>
    <a class="collapsible-header">Administracion<i class="fa fa-bar-chart" aria-hidden="true"></i></a>
    <div class="collapsible-body">
      <ul>
        <li><a href="{{ url('/user') }}">Usuarios</a></li>
        <li><a href="#!">Respaldo</a></li>
        <li><a href="{{ url('/perfils') }}">Perfiles</a></li>
      </ul>
    </div>
  </li>
</ul>
<!--
<li class="{{ Request::is('marcas*') ? 'active' : '' }}">
    <a href="{!! route('marcas.index') !!}">marcas</a>
</li>

<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href="{!! route('pedidos.index') !!}">pedidos</a>
</li>

<li class="{{ Request::is('modelos*') ? 'active' : '' }}">
    <a href="{!! route('modelos.index') !!}">modelos</a>
</li>

<li class="{{ Request::is('colors*') ? 'active' : '' }}">
    <a href="{!! route('colors.index') !!}">colors</a>
</li>
-->
