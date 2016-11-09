<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecuponRequest;
use App\Http\Requests\UpdatecuponRequest;
use App\Repositories\cuponRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class cuponController extends InfyOmBaseController
{
    /** @var  cuponRepository */
    private $cuponRepository;

    public function __construct(cuponRepository $cuponRepo)
    {
        $this->cuponRepository = $cuponRepo;
    }

    /**
     * Display a listing of the cupon.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cuponRepository->pushCriteria(new RequestCriteria($request));
        $cupons = $this->cuponRepository->all();

        return view('cupons.index')
            ->with('cupons', $cupons);
    }

    /**
     * Show the form for creating a new cupon.
     *
     * @return Response
     */
    public function create()
    {
        return view('cupons.create');
    }

    /**
     * Store a newly created cupon in storage.
     *
     * @param CreatecuponRequest $request
     *
     * @return Response
     */
    public function store(CreatecuponRequest $request)
    {
        $input = $request->all();

        $input['estado'] =  "0";
        $input['numero'] =  rand(0, 100000);
        $input['tipo']   =  "1";


        //validar que el cupon no este generado -------------------------/
        // $cupon = \App\Models\cupon::where('numero', '=', $input['numero'])->get()->first();
        // while(!empty($cupon)){
        //     $input['numero'] =  rand(0, 100000);
        //     $cupon = \App\Models\cupon::where('numero', '=', $input['numero'] )->get()->first();
        // }

        $cupon = $this->cuponRepository->create($input);

        Flash::success('Cupon Guardado.');

        return redirect(route('cupons.index'));
    }

    /**
     * Display the specified cupon.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cupon = $this->cuponRepository->findWithoutFail($id);

        if (empty($cupon)) {
            Flash::error('cupon not found');

            return redirect(route('cupons.index'));
        }

        return view('cupons.show')->with('cupon', $cupon);
    }

    /**
     * Show the form for editing the specified cupon.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cupon = $this->cuponRepository->findWithoutFail($id);

        if (empty($cupon)) {
            Flash::error('cupon not found');

            return redirect(route('cupons.index'));
        }

        return view('cupons.edit')->with('cupon', $cupon);
    }

    /**
     * Update the specified cupon in storage.
     *
     * @param  int              $id
     * @param UpdatecuponRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecuponRequest $request)
    {
        $cupon = $this->cuponRepository->findWithoutFail($id);

        if (empty($cupon)) {
            Flash::error('cupon not found');

            return redirect(route('cupons.index'));
        }

        $cupon = $this->cuponRepository->update($request->all(), $id);

        Flash::success('Cupon Actualizado.');

        return redirect(route('cupons.index'));
    }

    /**
     * Remove the specified cupon from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cupon = $this->cuponRepository->findWithoutFail($id);

        if (empty($cupon)) {
            Flash::error('cupon not found');

            return redirect(route('cupons.index'));
        }

        $this->cuponRepository->delete($id);

        Flash::success('Cupon Eliminado.');

        return redirect(route('cupons.index'));
    }

    /*********************************   Funciopnes extras **********************/
    public function usar($numero)
    {
      //$cupon = $this->cuponRepository->findWithoutFail(1);
      $cupon = \App\Models\cupon::where('numero', '=', $numero)->get()->first();

      if (empty($cupon)) {
          Flash::error('cupon not found');
          return NULL;
      }

      if($cupon->estado  == '1'){
          return NULL;
      }

      $cupon->estado = '1';
      $cupon->save();

      //$cupon = $this->cuponRepository->update($request->all(), $id);
      Flash::success('Cupon encontrados.');

      // return redirect(route('cupons.index'));
      return $cupon;
    }
}
