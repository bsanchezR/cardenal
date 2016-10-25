<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepedidoRequest;
use App\Http\Requests\CreatepersianaRequest;
use App\Http\Requests\UpdatepedidoRequest;
use App\Repositories\pedidoRepository;
use App\Repositories\persianaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class pedidoController extends InfyOmBaseController
{
    /** @var  pedidoRepository */
    private $pedidoRepository;

    public function __construct(pedidoRepository $pedidoRepo)
    {
        $this->pedidoRepository = $pedidoRepo;
    }

    /**
     * Display a listing of the pedido.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pedidoRepository->pushCriteria(new RequestCriteria($request));
        $pedidos = $this->pedidoRepository->all();
        foreach ($pedidos as $pedido )
        {
          if($pedido->fecha_entrega == NULL || $pedido->fecha_entrega == '' || $pedido->fecha_entrega == '-0001-11-30 00:00:00' || $pedido->fecha_entrega == '0000-00-00')
            $pedido->fecha_entrega = NULL;
          if($pedido->fecha_produccion == NULL || $pedido->fecha_produccion == '' || $pedido->fecha_produccion == '-0001-11-30 00:00:00' || $pedido->fecha_produccion == '0000-00-00')
            $pedido->fecha_produccion = NULL;
          if($pedido->fecha_instalacion == NULL || $pedido->fecha_instalacion == '' || $pedido->fecha_instalacion == '-0001-11-30 00:00:00' || $pedido->fecha_instalacion == '0000-00-00')
            $pedido->fecha_instalacion = NULL;
        }
        return view('pedidos.index')
            ->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new pedido.
     *
     * @return Response
     */
    public function create()
    {
        // $usuarios = \App\User::all();
        // $clientes = \App\Cliente::all();
        // $marcas = \App\marca::all();
        // $modelos = \App\modelo::all();
        // foreach ($modelos as $key )
        // {
        //   $key->colors;
        // }
        // foreach ($marcas as $key )
        // {
        //   $key->modelos;
        // }
        // return view('pedidos.create',['usuarios' => $usuarios , 'clientes'=> $clientes , 'marcas'=> $marcas, 'modelos'=> $modelos]);

        $usuarios = \App\User::all();
        $clientes = \App\Cliente::all();
        $marcas = \App\marca::all();
        // $modelos = DB::table('modelos')->select('nombre')->distinct()->get();
        // $colores= DB::table('modelos')->select('color')->distinct()->get();
        return view('pedidos.create',['usuarios' => $usuarios , 'clientes'=> $clientes , 'marcas'=> $marcas]);
    }

    public function get_marcas($tipo)
    {
      $marcas = DB::table('modelos')->select('marca_id')->distinct()->where('id_tipo' , '=' ,$tipo)->get();
      return response()->json(['status'=>'ok','data'=>$marcas], 200);
    }

    public function get_modelos($marca)
    {
      $porciones = explode(",", $marca);
      $modelos = DB::table('modelos')->select('nombre')->distinct()->where([['marca_id' , '=' , $porciones[0]],['id_tipo','=',$porciones[1]]])->get();
      return response()->json(['status'=>'ok','data'=>$modelos], 200);
    }

    public function get_colores($modelo)
    {
      $porciones = explode(",", $modelo);
      $colores= DB::table('modelos')->select('color')->distinct()->where([['nombre' , '=' , $porciones[0]],['id_tipo','=',$porciones[1]]])->get();
      return response()->json(['status'=>'ok','data'=>$colores], 200);
    }

    public function get_id($cadena)
    {
      $porciones = explode(",", $cadena);
      $id= DB::table('modelos')->select('*')->where([['id_tipo' , '=' , $porciones[0]] , ['marca_id' , '=' , $porciones[1]] , ['nombre' , '=' , $porciones[2]] , ['color' , '=' , $porciones[3]]])->get();
      return response()->json(['status'=>'ok','data'=>$id], 200);
    }

    /**
     * Store a newly created pedido in storage.
     *
     * @param CreatepedidoRequest $request
     *
     * @return Response
     */
    public function store(CreatepedidoRequest $request)
    {
      $usuarios = \App\User::all();
      $clientes = \App\Cliente::all();
      $marcas = \App\marca::all();

        if($request->fecha_entrega == NULL || $request->fecha_entrega == '' || $request->fecha_entrega == '-0001-11-30 00:00:00' || $request->fecha_entrega == '0000-00-00')
        {
            $request->fecha_entrega = NULL;
        }
        if($request->fecha_produccion == NULL || $request->fecha_produccion == '' || $request->fecha_produccion == '-0001-11-30 00:00:00' || $request->fecha_produccion == '0000-00-00')
        {
          $request->fecha_produccion = NULL;
        }
        if($request->fecha_instalacion == NULL || $request->fecha_instalacion == '' || $request->fecha_instalacion == '-0001-11-30 00:00:00' || $request->fecha_instalacion == '0000-00-00')
        {
          $request->fecha_instalacion = NULL;
        }
        $input = $request->all();
        //  dd( $request);

          $persianas=[];
          $pedido = $this->pedidoRepository->create($input);
          for($i=0;$i<$request->numero;$i++)
          {
            $persiana= new \App\persiana();
            $persiana->pedido_id=$pedido->id;
            $persiana->modelo_id=$request->modelo_id;
            $persiana->color=$request->color;
            $persiana->tipo=$request->tipo;
            $persiana->subtipo='sheer';
            $persiana->control_p=$request->{'control_p'.$i};
            $persiana->altura_control=$request->{'altura_control'.$i};
            $persiana->motor=$request->{'motor'.$i};
            $persiana->soporte_u=$request->{'soporte_u'.$i};
            $persiana->soporte_m=$request->{'soporte_m'.$i};
            $persiana->soporte_p=$request->{'soporte_p'.$i};
            $persiana->tipo_motor=$request->{'tipo_motor'.$i};
            $persiana->lado_motor=$request->{'lado_motor'.$i};
            $persiana->alto=$request->{'alto'.$i};
            $persiana->ancho=$request->{'ancho'.$i};
            $persiana->save();
            $persianas[$i]=$persiana;
          }

          $pedido = $this->pedidoRepository->findWithoutFail($pedido->id);

        if($request->nuevas && $request->nuevas == '1')
        {
          return view('pedidos.agregar',['usuarios' => $usuarios , 'clientes'=> $clientes , 'marcas'=> $marcas, 'nuevas' => '1','pedido'=>$pedido]);
        }
        else if($request->mismas && $request->mismas == '1')
        {
          return view('pedidos.agregar',['usuarios' => $usuarios , 'clientes'=> $clientes , 'marcas'=> $marcas, 'mismas' => '1','pedido'=>$pedido]);
        }
        else
        {
          Flash::success('Pedido guardado !!! .');
          return redirect(route('cotizar.pedidos',['id'=>$pedido->id]));
        }


    }

    /**
     * Display the specified pedido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('pedido not found');

            return redirect(route('pedidos.index'));
        }
        if($pedido->fecha_produccion == '0000-00-00')
          $pedido->fecha_produccion=null;
        $pedido->cliente;
        $pedido->user;
        if($pedido->fecha_entrega == NULL || $pedido->fecha_entrega == '' || $pedido->fecha_entrega == '-0001-11-30 00:00:00' || $pedido->fecha_entrega == '0000-00-00')
          $pedido->fecha_entrega = NULL;
        if($pedido->fecha_produccion == NULL || $pedido->fecha_produccion == '' || $pedido->fecha_produccion == '-0001-11-30 00:00:00' || $pedido->fecha_produccion == '0000-00-00')
          $pedido->fecha_produccion = NULL;
        if($pedido->fecha_instalacion == NULL || $pedido->fecha_instalacion == '' || $pedido->fecha_instalacion == '-0001-11-30 00:00:00' || $pedido->fecha_instalacion == '0000-00-00')
          $pedido->fecha_instalacion = NULL;

        return view('pedidos.show')->with('pedido', $pedido);
    }

    /**
     * Show the form for editing the specified pedido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('pedido not found');

            return redirect(route('pedidos.index'));
        }
        $usuarios = \App\User::all();
        $clientes = \App\Cliente::all();
        $marcas = \App\marca::all();
        return view('pedidos.edit',['pedido' => $pedido , 'usuarios' => $usuarios , 'clientes'=> $clientes, 'marcas'=> $marcas,]);
    }

    /**
     * Update the specified pedido in storage.
     *
     * @param  int              $id
     * @param UpdatepedidoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepedidoRequest $request)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('pedido not found');

            return redirect(route('pedidos.index'));
        }
        if($request->fecha_entrega == NULL || $request->fecha_entrega == '' || $request->fecha_entrega == '-0001-11-30 00:00:00' || $request->fecha_entrega == '0000-00-00')
          $request->fecha_entrega = NULL;
        if($request->fecha_produccion == NULL || $request->fecha_produccion == '' || $request->fecha_produccion == '-0001-11-30 00:00:00' || $request->fecha_entrega == '0000-00-00')
          $request->fecha_produccion = NULL;
        if($request->fecha_instalacion == NULL || $request->fecha_instalacion == '' || $request->fecha_instalacion == '-0001-11-30 00:00:00' || $request->fecha_entrega == '0000-00-00')
          $request->fecha_instalacion = NULL;
        $pedido = $this->pedidoRepository->update($request->all(), $id);

        Flash::success('Pedido actualizado !!!.');

        return redirect(route('pedidos.index'));
    }

    /**
     * Remove the specified pedido from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('pedido not found');

            return redirect(route('pedidos.index'));
        }

        $this->pedidoRepository->delete($id);

        Flash::success('Pedido borrado !!!.');

        return redirect(route('pedidos.index'));
    }

    public function cotiza($id)
    {
      $pedido = $this->pedidoRepository->findWithoutFail($id);

      if (empty($pedido))
      {
          Flash::error('pedido not found');

          return redirect(route('pedidos.index'));
      }
      $persianas =$pedido->persianas;
      foreach ($persianas as $key )
      {
        $key->modelo;
        $key->color;
      }
      return view('pedidos.cotiza',['pedido'=>$pedido,'persianas'=>$persianas]);
    }

    public function agregar($id, Request $request)
    {
      $usuarios = \App\User::all();
      $clientes = \App\Cliente::all();
      $marcas = \App\marca::all();

      $pedido = $this->pedidoRepository->findWithoutFail($id);

      if (empty($pedido)) {
          Flash::error('pedido not found');

          return redirect(route('pedidos.index'));
      }


      if($pedido->fecha_produccion == '0000-00-00')
        $pedido->fecha_produccion=null;
      $pedido->cliente;
      $pedido->user;
      if($pedido->fecha_entrega == NULL || $pedido->fecha_entrega == '' || $pedido->fecha_entrega == '-0001-11-30 00:00:00' || $pedido->fecha_entrega == '0000-00-00')
        $pedido->fecha_entrega = NULL;
      if($pedido->fecha_produccion == NULL || $pedido->fecha_produccion == '' || $pedido->fecha_produccion == '-0001-11-30 00:00:00' || $pedido->fecha_produccion == '0000-00-00')
        $pedido->fecha_produccion = NULL;
      if($pedido->fecha_instalacion == NULL || $pedido->fecha_instalacion == '' || $pedido->fecha_instalacion == '-0001-11-30 00:00:00' || $pedido->fecha_instalacion == '0000-00-00')
        $pedido->fecha_instalacion = NULL;

      $persianas=[];
      for($i=0;$i<$request->numero;$i++)
      {
        $persiana= new \App\persiana();
        $persiana->pedido_id=$pedido->id;
        $persiana->modelo_id=$request->modelo_id;
        $persiana->color=$request->color;
        $persiana->tipo=$request->tipo;
        $persiana->subtipo='sheer';
        $persiana->control_p=$request->{'control_p'.$i};
        $persiana->altura_control=$request->{'altura_control'.$i};
        $persiana->motor=$request->{'motor'.$i};
        $persiana->soporte_u=$request->{'soporte_u'.$i};
        $persiana->soporte_m=$request->{'soporte_m'.$i};
        $persiana->soporte_p=$request->{'soporte_p'.$i};
        $persiana->tipo_motor=$request->{'tipo_motor'.$i};
        $persiana->lado_motor=$request->{'lado_motor'.$i};
        $persiana->alto=$request->{'alto'.$i};
        $persiana->ancho=$request->{'ancho'.$i};
        $persiana->save();
        $persianas[$i]=$persiana;
      }

      if($request->nuevas && $request->nuevas == '1')
      {
        return view('pedidos.agregar',['usuarios' => $usuarios , 'clientes'=> $clientes , 'marcas'=> $marcas, 'nuevas' => '1','pedido'=>$pedido]);
      }
      else if($request->mismas && $request->mismas == '1')
      {
        return view('pedidos.agregar',['usuarios' => $usuarios , 'clientes'=> $clientes , 'marcas'=> $marcas, 'mismas' => '1','pedido'=>$pedido]);
      }
      else
      {
        Flash::success('Pedido guardado !!!.');

        return redirect(route('cotizar.pedidos',['id'=>$pedido->id]));
      }



    }

    // public function precios($id)
    // {
    //     $pedido = $this->pedidoRepository->findWithoutFail($id);
    //
    //     if (empty($pedido)) {
    //         Flash::error('pedido not found');
    //
    //         return redirect(route('pedidos.index'));
    //     }
    //     $categorias = \App\Models\categoria::all();
    //     return view('pedidos.precios',['pedido' => $pedido , 'categorias' => $categorias]);
    // }
}
