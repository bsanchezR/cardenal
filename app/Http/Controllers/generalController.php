<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatetiendaRequest;
use App\Http\Requests\UpdatetiendaRequest;
use App\Repositories\tiendaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class generalController extends InfyOmBaseController
{
    /** @var  marcaRepository */
    private $tiendaRepository;

    public function __construct(tiendaRepository $tiendaRepo)
    {
        $this->middleware('auth');
        $this->tiendaRepository = $tiendaRepo;
    }

    /**
     * Display a listing of the marca.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tiendaRepository->pushCriteria(new RequestCriteria($request));
        $tienda = $this->tiendaRepository->all();
        foreach ($tienda as $key)
        {
          $key->pedidos;
          foreach ($key->pedidos as $pedido)
          {
            $pedido->cliente;
          }
        }

        $currentMonth = date('m');
        $pedidos = \App\pedido::whereRaw('MONTH(fecha_pedido) = ?',[$currentMonth])->get();


        $ped = \App\pedido::whereRaw('fecha_pedido > DATE_SUB(now(), INTERVAL 3 MONTH)')->get();


        return view('general.index')
            ->with('tienda', $tienda)->with('mes',$pedidos)->with('meses',$ped);
    }


    public function show($id)
    {
        $tienda = $this->tiendaRepository->findWithoutFail($id);

        if (empty($tienda)) {
            Flash::error('tienda not found');

            return redirect(route('tienda.index'));
        }

        return view('general.show')->with('tienda', $tienda);
    }

}
