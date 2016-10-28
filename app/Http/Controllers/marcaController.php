<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemarcaRequest;
use App\Http\Requests\UpdatemarcaRequest;
use App\Repositories\marcaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class marcaController extends InfyOmBaseController
{
    /** @var  marcaRepository */
    private $marcaRepository;

    public function __construct(marcaRepository $marcaRepo)
    {
        $this->middleware('auth');
        $this->marcaRepository = $marcaRepo;
    }

    /**
     * Display a listing of the marca.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->marcaRepository->pushCriteria(new RequestCriteria($request));
        $marcas = $this->marcaRepository->all();

        return view('marcas.index')
            ->with('marcas', $marcas);
    }

    /**
     * Show the form for creating a new marca.
     *
     * @return Response
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created marca in storage.
     *
     * @param CreatemarcaRequest $request
     *
     * @return Response
     */
    public function store(CreatemarcaRequest $request)
    {
        $input = $request->all();

        $marca = $this->marcaRepository->create($input);

        Flash::success('marca saved successfully.');

        return redirect(route('marcas.index'));
    }

    /**
     * Display the specified marca.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $marca = $this->marcaRepository->findWithoutFail($id);

        if (empty($marca)) {
            Flash::error('marca not found');

            return redirect(route('marcas.index'));
        }

        return view('marcas.show')->with('marca', $marca);
    }

    /**
     * Show the form for editing the specified marca.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $marca = $this->marcaRepository->findWithoutFail($id);

        if (empty($marca)) {
            Flash::error('marca not found');

            return redirect(route('marcas.index'));
        }

        return view('marcas.edit')->with('marca', $marca);
    }

    /**
     * Update the specified marca in storage.
     *
     * @param  int              $id
     * @param UpdatemarcaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemarcaRequest $request)
    {
        $marca = $this->marcaRepository->findWithoutFail($id);

        if (empty($marca)) {
            Flash::error('marca not found');

            return redirect(route('marcas.index'));
        }

        $marca = $this->marcaRepository->update($request->all(), $id);

        Flash::success('marca updated successfully.');

        return redirect(route('marcas.index'));
    }

    /**
     * Remove the specified marca from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $marca = $this->marcaRepository->findWithoutFail($id);

        if (empty($marca)) {
            Flash::error('marca not found');

            return redirect(route('marcas.index'));
        }

        $this->marcaRepository->delete($id);

        Flash::success('marca deleted successfully.');

        return redirect(route('marcas.index'));
    }
}
