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

        return view('citas.index')
            ->with('citas', $citas);
    }

    /**
     * Show the form for creating a new cita.
     *
     * @return Response
     */
    public function create()
    {
        return view('citas.create');
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


    public function asignar(){
      return "<h1> hola </h1>";
    }
}
