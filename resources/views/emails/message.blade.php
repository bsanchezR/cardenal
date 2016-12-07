<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
  <title>Cotización</title>
  <style type="text/css">
  img {
   max-width: 100%;
  }
  body {
   -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6;
  }
  body {
    background-color: #f6f6f6;
  }
  @media only screen and (max-width: 640px) {
     h1 {
       font-weight: 600 !important; margin: 20px 0 5px !important;
     }
      h2 {
       font-weight: 600 !important; margin: 20px 0 5px !important;
      }
      h3 {
        font-weight: 600 !important; margin: 20px 0 5px !important;
      }
      h4 {
        font-weight: 600 !important; margin: 20px 0 5px !important;
        }
      h1 {
       font-size: 22px !important;
      }
      h2 {
        font-size: 18px !important;
      }
      h3 {
         font-size: 16px !important;
      }
     .container {
       width: 100% !important;
       }
     .content {
          padding: 10px !important;
      }
      .content-wrap {
            padding: 10px !important;
       }
       .invoice {
           width: 100% !important;
        }
  }
  </style>
</head>
<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6; background: #f6f6f6; margin: 0;">
  <div style="text-align:center; width:100%">
    <div style="width:100px; height:100px; text-align:center; margin: 0 30%; background: url(../../image-resources/logo.png) left 50% no-repeat;"><img src="../../image-resources/logo.png" alt="" /></div>
    <h4>Cotización Pedido No. {{$pedidos->folio}}</h4>
  </div>
  <table style="text-align:center; width:100%;">
    <thead>
      <tr>
        <th>Cantidad</th>
        <th>Descripcion</th>
        <th>Precio Unitario</th>
        <th>Subtotal</th>
        <th>Ancho</th>
        <th>Alto</th>
        <th>Total m<sup>2</sup></th>
      </tr>
    </thead>
    <tbody id="tabla_persianas">
      <?php
        $i=0;
        $intermedio=0;
        $manuales=0;
        $motores=0;
      ?>
      @foreach($pedidos->persianas as $key)
      <tr>
        <td>1</td>
        <td>{{ $key->tipo }} {{ $key->color }}</td>
        <td>${{ $precios[$i] }}</td>
        <td>${{ $precios[$i] }}</td>
        <td>{{ $key->ancho }}</td>
        <td>{{ $key->alto }}</td>
        <td>{{ ($key->ancho*$key->alto) }}</td>
      </tr>
      <?php
        $i++;
        if($key->soporte_p == 'intermedio')
        {
          $intermedio++;
        }
        if($key->motor == '')
        {
          $manuales++;
        }
        else
        {
          $motores++;
        }
      ?>
      @endforeach
      @if($pedidos->instalacion != 0)
        @if($manuales != 0)
          <tr>
          <td>{{ $manuales }}</td>
          <td>Instalacion de persiana manual</td>
          <td>$100</td>
          <td>${{ $manuales*100 }}</td>
          <td>---</td>
          <td>---</td>
          <td>---</td>
          </tr>
        @endif
        @if($motores != 0)
          <tr>
          <td>{{ $manuales }}</td>
          <td>Instalacion de persiana motorizada</td>
          <td>$200</td>
          <td>${{ $manuales*200 }}</td>
          <td>---</td>
          <td>---</td>
          <td>---</td>
          </tr>
        @endif
      @endif
      @if($intermedio != 0)
        <tr>
        <td>{{ $intermedio }}</td>
        <td>Soportes Intermedios</td>
        <td>$100</td>
        <td>${{ $intermedio*100 }}</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        </tr>
      @endif
    </tbody>
  </table>
  <div style="text-align:center; width:100%">
      <h5>Fecha de Pedido: {{explode(" ",$pedidos->fecha_pedido)[0]}}</h5>
      <h5>Fecha de Entrega: {{explode(" ",$pedidos->fecha_entrega)[0]}}</h5>
      <h5>Fecha de Instalacion: {{explode(" ",$pedidos->fecha_instalacion)[0]}}</h5>
      <br>
      @if($pedidos->instalacion != 0)
        <h5>Con instalaciones</h5>
      @endif
      @if($pedidos->tipo_pago == 'credito')
        <h5>Tipo de pago: Tarjeta de Credito</h5>
        <h5>Monto: {{$pedidos->monto}}</h5>
      @elseif($pedidos->tipo_pago == 'debito')
        <h5>Tipo de pago: Tarjeta de Debito</h5>
      @elseif($pedidos->tipo_pago == 'contado')
        <h5>Tipo de pago: {{$pedidos->tipo_pago}}</h5>
        <h5>Monto: ${{$pedidos->monto}}</h5>
      @else
        <h5>Tipo de pago: {{$pedidos->tipo_pago}}</h5>
      @endif
      <h5>Total firmado: ${{$pedidos->total}}</h5>
      <div id="firma_aca">
        <img src="http://localhost:8000/ic/firmas/cardenal1480545885969.png" alt="Firma...">
      </div>
  </div>
</body>
</html>
