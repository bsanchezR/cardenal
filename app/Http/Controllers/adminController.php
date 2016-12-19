<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepedidoRequest;
use App\Http\Requests\CreatepersianaRequest;
use App\Http\Requests\UpdatepedidoRequest;
use App\Repositories\pedidoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class adminController extends InfyOmBaseController
{
    /** @var  pedidoRepository */
    private $pedidoRepository;

    public function __construct(pedidoRepository $pedidoRepo)
    {
        $this->middleware('auth');
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
      //   $pedidos = $this->pedidoRepository->all();
        $pedidos = \App\pedido::where('estado','<>','cotizacion')->get();
        $vend = \App\user::where('tipo_usuario','=','vendedor')->orWhere('tipo_usuario','=','administrador')->orWhere('tipo_usuario','=','admin')->get();

        return view('admin.index')
            ->with('pedidos', $pedidos)
            ->with('vendedores', $vend);
    }


    public function show($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido))
        {
            Flash::error('pedido not found');

            return redirect(route('admin.index'));
        }

          $monto=0;
          foreach ($pedido->pagos_historial as $key)
          {
            $monto= $monto+$key->monto;
          }

        return view('admin.show',['pedido' => $pedido, 'subtotal' => $monto]);
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

             return redirect(route('admin.index'));
         }

         $pedido->estado='pedido';
        //  $pedido->save();
         return redirect(route('admin.index'));
     }


    /**
     * Update the specified pedido in storage.
     *
     * @param  int              $id
     * @param UpdatepedidoRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        //  dd($request,$request->vendedor==0,$request->estado == -1,$request->fecha_inicial == 'null');

         if($request->estado == -1)
         {
           if($request->vendedor == 0)
           {
             if($request->fecha_inicial == 'null' && $request->fecha_final == 'null')
             {
               $pedidos= \App\pedido::all();
             }
             if($request->fecha_inicial != 'null' && $request->fecha_final == 'null')
             {
               $pedidos= \App\pedido::where('fecha_pedido','>=',$request->fecha_inicial)->get();
             }
             if($request->fecha_inicial == 'null' && $request->fecha_final != 'null')
             {
               $pedidos= \App\pedido::where('fecha_pedido','<=',$request->fecha_final)->get();
             }
             if($request->fecha_inicial != 'null' && $request->fecha_final != 'null')
             {
               $pedidos= \App\pedido::where('fecha_pedido','<=',$request->fecha_final)->where('fecha_pedido','>=',$request->fecha_inicial)->get();
             }
           }
           else
           {
             if($request->fecha_inicial == 'null' && $request->fecha_final == 'null')
             {
               $pedidos= \App\pedido::where('user_id','=',$request->vendedor)->get();
             }
             if($request->fecha_inicial != 'null' && $request->fecha_final == 'null')
             {
               $pedidos= \App\pedido::where('user_id','=',$request->vendedor)->where('fecha_pedido','>=',$request->fecha_inicial)->get();
             }
             if($request->fecha_inicial == 'null' && $request->fecha_final != 'null')
             {
               $pedidos= \App\pedido::where('user_id','=',$request->vendedor)->where('fecha_pedido','<=',$request->fecha_final)->get();
             }
             if($request->fecha_inicial != 'null' && $request->fecha_final != 'null')
             {
               $pedidos= \App\pedido::where('user_id','=',$request->vendedor)->where('fecha_pedido','<=',$request->fecha_final)->where('fecha_pedido','>=',$request->fecha_inicial)->get();
             }
           }
         }
         else
         {
           if($request->vendedor == 0)
           {
             if($request->fecha_inicial == 'null' && $request->fecha_final == 'null')
             {
               $pedidos= \App\pedido::where('checado','=',$request->estado)->get();
             }
             if($request->fecha_inicial != 'null' && $request->fecha_final == 'null')
             {
               $pedidos= \App\pedido::where('checado','=',$request->estado)->where('fecha_pedido','>=',$request->fecha_inicial)->get();
             }
             if($request->fecha_inicial == 'null' && $request->fecha_final != 'null')
             {
               $pedidos= \App\pedido::where('checado','=',$request->estado)->where('fecha_pedido','<=',$request->fecha_final)->get();
             }
             if($request->fecha_inicial != 'null' && $request->fecha_final != 'null')
             {
               $pedidos= \App\pedido::where('checado','=',$request->estado)->where('fecha_pedido','<=',$request->fecha_final)->where('fecha_pedido','>=',$request->fecha_inicial)->get();
             }
           }
           else
           {
             if($request->fecha_inicial == 'null' && $request->fecha_final == 'null')
             {
               $pedidos= \App\pedido::where('checado','=',$request->estado)->where('user_id','=',$request->vendedor)->get();
             }
             if($request->fecha_inicial != 'null' && $request->fecha_final == 'null')
             {
               $pedidos= \App\pedido::where('checado','=',$request->estado)->where('user_id','=',$request->vendedor)->where('fecha_pedido','>=',$request->fecha_inicial)->get();
             }
             if($request->fecha_inicial == 'null' && $request->fecha_final != 'null')
             {
               $pedidos= \App\pedido::where('checado','=',$request->estado)->where('user_id','=',$request->vendedor)->where('fecha_pedido','<=',$request->fecha_final)->get();
             }
             if($request->fecha_inicial != 'null' && $request->fecha_final != 'null')
             {
               $pedidos= \App\pedido::where('checado','=',$request->estado)->where('user_id','=',$request->vendedor)->where('fecha_pedido','<=',$request->fecha_final)->where('fecha_pedido','>=',$request->fecha_inicial)->get();
             }
           }
         }

        $vend = \App\user::where('tipo_usuario','=','vendedor')->orWhere('tipo_usuario','=','administrador')->orWhere('tipo_usuario','=','admin')->get();
        return view('admin.index')
            ->with('pedidos', $pedidos)
            ->with('vendedores', $vend);
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
            Flash::error('compra not found');

            return redirect(route('admin.index'));
        }

        $this->pedidoRepository->delete($id);

        Flash::success('Compra borrado !!!.');

        return redirect(route('admin.index'));
    }

}
