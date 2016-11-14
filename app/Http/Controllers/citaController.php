<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecitaRequest;
use App\Http\Requests\UpdatecitaRequest;
use App\Repositories\citaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class citaController extends InfyOmBaseController
{
    /** @var  citaRepository */
    private $citaRepository;

    public function __construct(citaRepository $citaRepo)
    {
        $this->middleware('auth');
        $this->citaRepository = $citaRepo;
    }

    /**
     * Display a listing of the cita.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->citaRepository->pushCriteria(new RequestCriteria($request));
        $citas = $this->citaRepository->all();
        $vendedores =  \App\User::where('tipo_usuario','=','vendedor')->get();

        return view('citas.index')
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
        $clientes =  \App\Cliente::all();

        return view('citas.create')->with('clientes', $clientes);
    }

    /**
     * Store a newly created cita in storage.
     *
     * @param CreatecitaRequest $request
     *
     * @return Response
     */
    public function store(CreatecitaRequest $request)
    {
        $input = $request->all();
        $cita = $this->citaRepository->create($input);

        Flash::success('cita saved successfully.');

        return redirect(route('citas.index'));
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
        $cita = $this->citaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('cita not found');

            return redirect(route('citas.index'));
        }

        return view('citas.show')->with('cita', $cita);
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
        $cita = $this->citaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('cita not found');

            return redirect(route('citas.index'));
        }

        return view('citas.edit')->with('cita', $cita);
    }

    /**
     * Update the specified cita in storage.
     *
     * @param  int              $id
     * @param UpdatecitaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecitaRequest $request)
    {
        $cita = $this->citaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('cita not found');

            return redirect(route('citas.index'));
        }

        $cita = $this->citaRepository->update($request->all(), $id);

        Flash::success('cita updated successfully.');

        return redirect(route('citas.index'));
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
        $cita = $this->citaRepository->findWithoutFail($id);

        if (empty($cita)) {
            Flash::error('cita not found');

            return redirect(route('citas.index'));
        }

        $this->citaRepository->delete($id);

        Flash::success('cita deleted successfully.');

        return redirect(route('citas.index'));
    }


    public function asignarCita($id){
      $ides =  explode("-", $id);

      $cita = \App\Models\cita::where('id', '=', $ides[1])->get()->first();
      $usuario =  \App\User::where('id','=',$ides[0])->get()->first();
      $cita->user_id =  $usuario->id;
      $cita->save();

      dd($cita);
    }

    public function vendedoresSinCita($id)
    {
      $cita = \App\Models\cita::where('id', '=', $id)->get()->first();

      $listaVendedores =  \App\User::where('tipo_usuario','=','vendedor')->get();
      $vendedores = [];
      $bandera = false;
      $indice = 0;
            foreach ($listaVendedores as $vendedor){
                 if($vendedor->citas != null){
                   foreach ($vendedor->citas as $cita2){
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
      $citas = \App\Models\cita::where('user_id', '=', $id)->get();
      //dd($cita);
      // return response()->json(['status'=>'ok','data'=>$citas], 200);
      return $citas;
    }
}
