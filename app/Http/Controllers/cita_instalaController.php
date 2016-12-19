<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createcita_instalaRequest;
use App\Http\Requests\Updatecita_instalaRequest;
use App\Repositories\cita_instalaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class cita_instalaController extends InfyOmBaseController
{
    /** @var  citaRepository */
    private $cita_instalaRepository;

    public function __construct(cita_instalaRepository $citaRepo)
    {
        $this->middleware('auth');
        $this->cita_instalaRepository = $citaRepo;
    }

    /**
     * Display a listing of the cita.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cita_instalaRepository->pushCriteria(new RequestCriteria($request));
        $citas = $this->cita_instalaRepository->all();
        foreach ($citas as $key )
        {
          $key->user;
        }
        $vendedores =  \App\User::where('tipo_usuario','=','instalador')->get();
        return view('citas_instala.index')
            ->with('citas', $citas)
            ->with('vendedores', $vendedores);

        //return view('citas.index',['citas' => $citas , '$vendedores'=> $vendedores , 'marcas'=> $marcas, 'tiendas'=> $tiendas]);
    }

    /**
     * Show the form for creating a new cita.
     *
     * @return Response
     */
    public function create()
    {
        $pedidos= \App\pedido::select('id','folio')->where('estado','=','instalacion')->get();
        $opciones=[];
        foreach ($pedidos as $key)
        {
          $flag=true;
          if($key->citas_instalaciones != null)
          {
            foreach ($key->citas_instalaciones as $k)
            {
              if($k->completado != 'error')
              {
                $flag=false;
              }
            }
          }
          if($flag)
          {
            $opciones[]=$key;
          }
        }
        return view('citas_instala.create')->with('pedidos',$opciones);
    }

    /**
     * Store a newly created cita in storage.
     *
     * @param CreatecitaRequest $request
     *
     * @return Response
     */
    public function store(Createcita_instalaRequest $request)
    {
        $input = $request->all();
        $cita = $this->cita_instalaRepository->create($input);

        Flash::success('cita saved successfully.');

        return redirect(route('citas_instala.index'));
    }

    /**
     * Display the specified cita.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cita = $this->cita_instalaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('cita not found');

            return redirect(route('citas_instala.index'));
        }

        return view('citas_instala.show')->with('cita', $cita);
    }

    /**
     * Show the form for editing the specified cita.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cita = $this->cita_instalaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('cita not found');

            return redirect(route('citas_instala.index'));
        }
        return view('citas_instala.edit')->with('cita', $cita);
    }

    /**
     * Update the specified cita in storage.
     *
     * @param  int              $id
     * @param UpdatecitaRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecita_instalaRequest $request)
    {
        $cita = $this->cita_instalaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('cita not found');

            return redirect(route('citas_instala.index'));
        }

        $cita = $this->cita_instalaRepository->update($request->all(), $id);

        Flash::success('cita updated successfully.');

        return redirect(route('citas_instala.index'));
    }

    /**
     * Remove the specified cita from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cita = $this->cita_instalaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('cita not found');

            return redirect(route('citas_instala.index'));
        }

        $this->cita_instalaRepository->delete($id);

        Flash::success('cita deleted successfully.');

        return redirect(route('citas_instala.index'));
    }


    public function asignarCita($id){
      $ides =  explode("-", $id);
      $cita = \App\Models\cita_instala::where('id', '=', $ides[1])->get()->first();
      $usuario =  \App\User::where('id','=',$ides[0])->get()->first();
      $cita->user_id =  $usuario->id;
      $cita->asigno=$ides[2];
      $cita->completado='falta';
      $cita->save();
      dd($cita);
    }

    public function vendedoresSinCita($id)
    {
      $cita = \App\Models\cita_instala::where('id', '=', $id)->get()->first();

      $listaVendedores =  \App\User::where('tipo_usuario','=','instalador')->get();
      $vendedores = [];
      $bandera = false;
      $indice = 0;
            foreach ($listaVendedores as $vendedor){
                 if($vendedor->citas_instala != null){
                   foreach ($vendedor->citas_instala as $cita2){
                      if($cita2->hora == $cita->hora && $cita2->fecha == $cita->fecha){
                          $bandera =  true;
                      }
                   }
                   if(!$bandera){
                     $vendedores[$indice] = $vendedor;
                     $indice++;
                   }
                   $bandera = false;
                 }
            }

      return $vendedores;
    }

    public function  vendedorCitas($id){
      $citas = \App\Models\cita_instala::where('user_id', '=', $id)->get();
      foreach ($citas as $key)
      {
        $key->user;
        $key->cliente;
      }
      //dd($cita);
      // return response()->json(['status'=>'ok','data'=>$citas], 200);
      return $citas;
    }

    public function hecho($id)
    {
      $cita = $this->cita_instalaRepository->findWithoutFail($id);

      if (empty($cita))
      {
          Flash::error('cita not found');

          return redirect(route('citas_instala.index'));
      }
      $cita->completado='hecho';
      $cita->save();
      return redirect(route('citas_instala.index'));
    }

    public function error($id)
    {
      $porciones = explode("@", $id);
      $cita = $this->cita_instalaRepository->findWithoutFail($porciones[0]);

      if (empty($cita))
      {
          Flash::error('cita not found');

          return redirect(route('citas_instala.index'));
      }
      $cita->completado='error';
      $cita->notas= $cita->notas.' -'.$porciones[1];
      $cita->save();
      return redirect(route('citas_instala.index'));
    }

    public function crear_cita($id)
    {
        $pedidos= \App\pedido::select('id','folio')->where('estado','=','instalacion')->get();

        $selec= \App\pedido::find($id);
        $opciones=[];
        foreach ($pedidos as $key)
        {
          $flag=true;
          if($key->citas_instalaciones != null)
          {
            foreach ($key->citas_instalaciones as $k)
            {
              if($k->completado != 'error')
              {
                $flag=false;
              }
            }
          }
          if($flag)
          {
            $opciones[]=$key;
          }
        }
        return view('citas_instala.create')->with('pedidos',$opciones)->with('selec', $selec);
    }
}
