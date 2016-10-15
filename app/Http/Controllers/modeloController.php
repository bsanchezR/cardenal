<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemodeloRequest;
use App\Http\Requests\UpdatemodeloRequest;
use App\Repositories\modeloRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class modeloController extends InfyOmBaseController
{
    /** @var  modeloRepository */
    private $modeloRepository;

    public function __construct(modeloRepository $modeloRepo)
    {
        $this->modeloRepository = $modeloRepo;
    }

    /**
     * Display a listing of the modelo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modeloRepository->pushCriteria(new RequestCriteria($request));
        $modelos = $this->modeloRepository->all();

        return view('modelos.index')
            ->with('modelos', $modelos);
    }

    /**
     * Show the form for creating a new modelo.
     *
     * @return Response
     */
    public function create()
    {
        $marcas = \App\marca::all();
        return view('modelos.create', ['marca' => $marcas ]);
    }

    /**
     * Store a newly created modelo in storage.
     *
     * @param CreatemodeloRequest $request
     *
     * @return Response
     */
    public function store(CreatemodeloRequest $request)
    {
        $input = $request->all();

        $modelo = $this->modeloRepository->create($input);

        Flash::success('modelo saved successfully.');

        return redirect(route('modelos.index'));
    }

    /**
     * Display the specified modelo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modelo = $this->modeloRepository->findWithoutFail($id);

        if (empty($modelo)) {
            Flash::error('modelo not found');

            return redirect(route('modelos.index'));
        }

        return view('modelos.show')->with('modelo', $modelo);
    }

    /**
     * Show the form for editing the specified modelo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modelo = $this->modeloRepository->findWithoutFail($id);

        if (empty($modelo)) {
            Flash::error('modelo not found');

            return redirect(route('modelos.index'));
        }
        $marcas = \App\marca::all();
        return view('modelos.edit',['modelo' => $modelo,'marca' => $marcas ]);
    }

    /**
     * Update the specified modelo in storage.
     *
     * @param  int              $id
     * @param UpdatemodeloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemodeloRequest $request)
    {
        $modelo = $this->modeloRepository->findWithoutFail($id);

        if (empty($modelo)) {
            Flash::error('modelo not found');

            return redirect(route('modelos.index'));
        }

        $modelo = $this->modeloRepository->update($request->all(), $id);

        Flash::success('modelo updated successfully.');

        return redirect(route('modelos.index'));
    }

    /**
     * Remove the specified modelo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modelo = $this->modeloRepository->findWithoutFail($id);

        if (empty($modelo)) {
            Flash::error('modelo not found');

            return redirect(route('modelos.index'));
        }

        $this->modeloRepository->delete($id);

        Flash::success('modelo deleted successfully.');

        return redirect(route('modelos.index'));
    }
}
