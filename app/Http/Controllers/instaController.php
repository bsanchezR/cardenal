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

class instaController extends InfyOmBaseController
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
        $pedidos = \App\pedido::where('estado','=','instalacion')->get();
        foreach ($pedidos as $pedido )
        {
          if($pedido->fecha_entrega == NULL || $pedido->fecha_entrega == '' || $pedido->fecha_entrega == '-0001-11-30 00:00:00' || $pedido->fecha_entrega == '0000-00-00')
            $pedido->fecha_entrega = NULL;
          if($pedido->fecha_produccion == NULL || $pedido->fecha_produccion == '' || $pedido->fecha_produccion == '-0001-11-30 00:00:00' || $pedido->fecha_produccion == '0000-00-00')
            $pedido->fecha_produccion = NULL;
          if($pedido->fecha_instalacion == NULL || $pedido->fecha_instalacion == '' || $pedido->fecha_instalacion == '-0001-11-30 00:00:00' || $pedido->fecha_instalacion == '0000-00-00')
            $pedido->fecha_instalacion = NULL;
        }
        return view('instalacion.index')
            ->with('pedidos', $pedidos);
    }


    public function show($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);
        $pedido->cliente;

        if (empty($pedido)) {
            Flash::error('pedido not found');

            return redirect(route('compras.index'));
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

          $monto=0;
          foreach ($pedido->pagos_historial as $key)
          {
            $monto= $monto+$key->monto;
          }
          $bandera=true;
        if($pedido->citas_instalaciones != null)
        {
            foreach ($pedido->citas_instalaciones as $key)
            {
              if($key->completado != 'error')
              {
                $bandera=false;
              }
            }
        }
        return view('instalacion.show',['pedido' => $pedido, 'persianas' => $pedido->persianas,'subtotal' => $monto, 'cita' => $bandera]);
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

             return redirect(route('instalacion.index'));
         }

         $pedido->estado='pedido';
         $pedido->save();
         return redirect(route('instalacion.index'));
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

            return redirect(route('instalacion.index'));
        }
        if($request->fecha_entrega == NULL || $request->fecha_entrega == '' || $request->fecha_entrega == '-0001-11-30 00:00:00' || $request->fecha_entrega == '0000-00-00')
          $request->fecha_entrega = NULL;
        if($request->fecha_produccion == NULL || $request->fecha_produccion == '' || $request->fecha_produccion == '-0001-11-30 00:00:00' || $request->fecha_entrega == '0000-00-00')
          $request->fecha_produccion = NULL;
        if($request->fecha_instalacion == NULL || $request->fecha_instalacion == '' || $request->fecha_instalacion == '-0001-11-30 00:00:00' || $request->fecha_entrega == '0000-00-00')
          $request->fecha_instalacion = NULL;
        $pedido = $this->pedidoRepository->update($request->all(), $id);

        Flash::success('Pedido actualizado !!!.');

        return redirect(route('instalacion.index'));
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

            return redirect(route('instalacion.index'));
        }

        $this->pedidoRepository->delete($id);

        Flash::success('Compra borrado !!!.');

        return redirect(route('instalacion.index'));
    }

}
