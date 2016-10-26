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
        return redirect()->route('pedidos.index');
    }

    public function show($id)
    {
      $imagen = \App\images::find($id);
      return $imagen;
    }


}
