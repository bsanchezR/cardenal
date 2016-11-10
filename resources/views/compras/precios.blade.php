@extends('layouts.app')

@section('content')
    <?php   $total=0; ?>
    <div class="col s12">
      <h3>Precio por cortina</h3>
    </div>
    @foreach($pedido->persianas as $persiana)
      <div class=" col s12 divider"></div>
      <div class="col s6">
        <label>Modelo :</label>
      </div>
      <div class="col s6">
        <p>{!! $persiana->modelo->nombre !!}</p>
      </div>
      <div class="col s3">
        <label>Producto</label>
      </div>
      <div class="col s3">
        <label>Costo Unitario</label>
      </div>
      <div class="col s3">
        <label>Costo Total</label>
      </div>
      <div class="col s3">
        <label>Validado</label>
      </div>
        @foreach($categorias as $categoria)
          @if(strtolower($categoria->nombre_categoria) === $persiana->subtipo)
            @foreach($categoria->productos as $producto)
              <div class="col s3">
                <label>{!! $producto->nombre_producto !!}</label>
              </div>
              <div class="col s3">
                <p>{!! $producto->costo_unitario !!}</p>
              </div>
              <div class="col s3">
                <p>{!! ($producto->costo_unitario*4) !!}</p>
                <?php $total=$total+($producto->costo_unitario*4); ?>
              </div>
              <div class="col s3">
                <p>
                  <input class="boxes" type="checkbox" id="{!! $id_box=str_random(3) !!}" checked onchange="mostrar('{!! $id_box !!}')"/>
                  <label for="{!! $id_box !!}"></label>
                </p>
              </div>
            @endforeach
          @endif
        @endforeach
    @endforeach
    <div class="row hidden" id="prod_nuevo">
        <div class="col s12">
          <label>Escoge los productos a agregar</label>
        </div>
        <div class="col s4">
          <label>Productos</label>
        </div>
        <div class="col s4">
          <label>Precio</label>
        </div>
        <div class="col s4">
          <label>Agregar</label>
        </div>
    </div>
    <div class="form-group col s6 right-align">
           <label>Costo Total: </label>
    </div>
    <div class="form-group col s6 left-align">
           <p>$ {!! $total !!}</p>
    </div>
    <div class="form-group col s12">
           <a href="{!! route('pedidos.index') !!}" class="btn btn-default">Volver</a>
    </div>
    <script type="text/javascript">
      var categorias = {!! json_encode($categorias) !!};
      var bandera=false;
      function mostrar(id)
      {
        console.log(id);
        console.log(categorias);
        if(bandera==false)
        {
          for(var i=0;i<categorias.length;i++)
          {
              for(var j=0;j<categorias[i].productos.length;j++)
              {
                  $('#prod_nuevo').append('<div id="p'+i+'_'+j+'" class="form-group col s4"><label>'+categorias[i].productos[j].nombre_producto+'</label></div><div id="s'+i+'_'+j+'" class="form-group col s4"><p>'+categorias[i].productos[j].costo_unitario+'</p></div><div id="t'+i+'_'+j+'" class="col s4"><p><input type="checkbox" id="input_'+i+'_'+j+'"/><label for="input_'+i+'_'+j+'"></label></p></div>');
              }
          }
          $('#prod_nuevo').removeClass('hidden');
          $('#prod_nuevo').addClass('show');
          bandera=true;
        }
        if($('.boxes:checked').length == $('.boxes').length)
        {
          $('#prod_nuevo').removeClass('show');
          $('#prod_nuevo').addClass('hidden');
          for(var i=0;i<categorias.length;i++)
          {
              for(var j=0;j<categorias[i].productos.length;j++)
              {
                $('#p'+i+'_'+j+'').remove();
                $('#s'+i+'_'+j+'').remove();
                $('#t'+i+'_'+j+'').remove();
              }
          }
          bandera=false;
        }
      }
    </script>
@endsection
