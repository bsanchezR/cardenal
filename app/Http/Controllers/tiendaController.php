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

class tiendaController extends InfyOmBaseController
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

        return view('tienda.index')
            ->with('tienda', $tienda);
    }

    /**
     * Show the form for creating a new marca.
     *
     * @return Response
     */
    public function create()
    {
        return view('tienda.create');
    }

    /**
     * Store a newly created marca in storage.
     *
     * @param CreatemarcaRequest $request
     *
     * @return Response
     */
    public function store(CreatetiendaRequest $request)
    {
        $input = $request->all();

        $tienda = $this->tiendaRepository->create($input);

        Flash::success('tienda saved successfully.');

        return redirect(route('tienda.index'));
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
        $tienda = $this->tiendaRepository->findWithoutFail($id);

        if (empty($tienda)) {
            Flash::error('tienda not found');

            return redirect(route('tienda.index'));
        }

        return view('tienda.show')->with('tienda', $tienda);
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
        $tienda = $this->tiendaRepository->findWithoutFail($id);

        if (empty($tienda)) {
            Flash::error('tienda not found');

            return redirect(route('tienda.index'));
        }

        return view('tienda.edit')->with('tienda', $tienda);
    }

    /**
     * Update the specified marca in storage.
     *
     * @param  int              $id
     * @param UpdatemarcaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiendaRequest $request)
    {
        $tienda = $this->tiendaRepository->findWithoutFail($id);

        if (empty($tienda)) {
            Flash::error('tienda not found');

            return redirect(route('tienda.index'));
        }

        $tienda = $this->tiendaRepository->update($request->all(), $id);

        Flash::success('tienda updated successfully.');

        return redirect(route('tienda.index'));
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
        $tienda = $this->tiendaRepository->findWithoutFail($id);

        if (empty($tienda)) {
            Flash::error('tienda not found');

            return redirect(route('tienda.index'));
        }

        $this->tiendaRepository->delete($id);

        Flash::success('tienda deleted successfully.');

        return redirect(route('tienda.index'));
    }
}
