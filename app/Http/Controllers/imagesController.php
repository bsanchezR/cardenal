<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class imagesController extends InfyOmBaseController
{

    public function store(Request $request)
    {
        $imagen = new \App\images();
        $imagen->pedido_id = $request->pedido_id;
        $data= $request->contenido;
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
        $name='cardenal'.round(microtime(true) * 1000);
        $ruta=public_path().'/firmas/'.$name.'.png';
        file_put_contents($ruta, $data);
        $imagen->contenido=$ruta;
        $imagen->save();
        // dd($imagen,$ruta);
        $pedido=\App\pedido::find($request->pedido_id);
        $pedido->persianas;
        $pedido->total=$request->total;
        $pedido->checado=$request->user_id;
        $pedido->tipo_pago=$request->tipo_pago;
        if($request->instalacion != null)
        {
          $pedido->instalacion=1;
        }
        if($request->monto != null)
        {
          $pedido->monto=$request->monto;
        }
        if($request->fecha_instalacion != null)
        {
          $pedido->fecha_instalacion=$request->fecha_instalacion;
        }
        $pedido->fecha_entrega=$request->fecha_entrega;
        $pedido->fecha_pedido=$request->fecha_pedido;
        // $total=[];
        // $cantidad=[];
        // $flag=false;
        // foreach ($pedido->persianas as $key )
        // {
        //   if($key->motor == null)
        //   {
        //       $bandera = app ('App\Http\Controllers\comprasController')->stock( $key->tipo, null);
        //   }
        //   else
        //   {
        //       $bandera = app ('App\Http\Controllers\comprasController')->stock( $key->tipo, 1);
        //   }
        //   for($j=0;$j<count($bandera);$j++)
        //   {
        //     $clave = array_search($bandera[$j] , $total);
        //     if($clave !== false )
        //     {
        //       $cantidad[$clave]++;
        //     }
        //     else
        //     {
        //       $total[]=$bandera[$j];
        //       $cantidad[]=1;
        //     }
        //   }
        // }
        // for($i=0;$i<count($total);$i++)
        // {
        //   $ban = app ('App\Http\Controllers\almacenController')->faltan($total[$i],$cantidad[$i]);
        //   if($ban != null)
        //   {
        //     $flag=true;
        //     break;
        //   }
        // }
        // if(!$flag)
        // {
        //     $pedido->estado="produccion";
        // }
        // else
        // {
        //     $pedido->estado="compra";
        // }
        $pedido->estado="produccion";
        $pedido->save();

        // $nuevo = new Request;
        // $nuevo['email']=$pedido->cliente->email;
        // $nuevo['name']=$pedido->cliente->nombre;
        // $nuevo['subject']='Cotizacion';
        // $nuevo['id']=$pedido->id;
        return redirect()->route('send',[$pedido->id]);
        // return redirect()->route('pedidos.index');
    }

    public function show($id)
    {
      $imagen = \App\images::find($id);
      return $imagen;
    }


}
