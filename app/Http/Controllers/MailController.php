<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MailController extends Controller
{
  public function index()
  {
     return \View::make('contact');
  }
  public function send($id)
  {
    // dd($request);
    $pedido=\App\pedido::find($id);
     //guarda el valor de los campos enviados desde el form en un array
    //  $data = $request->all();
      $data = [];

     $precios=[];
     $persianas =$pedido->persianas;
     $i=0;
     foreach ($persianas as $key )
     {
       $key->modelo;
       $key->color;
       if($key->motor == null)
       {
           $precios[$i]= app ('App\Http\Controllers\almacenController')->precios($key->tipo, $key->alto,null);
       }
       if($key->motor == '1 lienzo')
       {
           $precios[$i]= app ('App\Http\Controllers\almacenController')->precios($key->tipo, $key->alto,1);
       }
       if($key->motor == '2 lienzos')
       {
           $precios[$i]= app ('App\Http\Controllers\almacenController')->precios($key->tipo, $key->alto,2);
       }
       if($key->motor == '3 lienzos')
       {
           $precios[$i]= app ('App\Http\Controllers\almacenController')->precios($key->tipo, $key->alto,3);
       }
       $i++;
     }
     $data['pedidos']=$pedido;
     $data['precios']=$precios;

     //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
     \Mail::send('emails.message', $data, function($message) use ($pedido)
     {
         //remitente
        //  $message->from($pedido->email, $request->name);
        // $message->from($pedido->cliente->email, $pedido->cliente->nombre);
        $message->to("dra_ker@hotmail.com", $pedido->cliente->nombre);

         //asunto
         $message->subject('Cotización');

         //receptor
         $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'));

     });
     return \View::make('success');
    //  return redirect()->route('pedidos.index');
  }
}
