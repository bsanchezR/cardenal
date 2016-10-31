<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatealmacenRequest;
use App\Http\Requests\UpdatealmacenRequest;
use App\Repositories\almacenRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class almacenController extends InfyOmBaseController
{
    /** @var  almacenRepository */
    private $almacenRepository;

    public function __construct(almacenRepository $almacenRepo)
    {
        $this->middleware('auth');
        $this->almacenRepository = $almacenRepo;
    }

    /**
     * Display a listing of the almacen.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->almacenRepository->pushCriteria(new RequestCriteria($request));
        $almacens = $this->almacenRepository->all();

        return view('almacens.index')
            ->with('almacens', $almacens);
    }

    /**
     * Show the form for creating a new almacen.
     *
     * @return Response
     */
    public function create()
    {
        return view('almacens.create');
    }

    /**
     * Store a newly created almacen in storage.
     *
     * @param CreatealmacenRequest $request
     *
     * @return Response
     */
    public function store(CreatealmacenRequest $request)
    {
        $input = $request->all();

        $almacen = $this->almacenRepository->create($input);

        Flash::success('almacen saved successfully.');

        return redirect(route('almacens.index'));
    }

    /**
     * Display the specified almacen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $almacen = $this->almacenRepository->findWithoutFail($id);

        if (empty($almacen)) {
            Flash::error('almacen not found');

            return redirect(route('almacens.index'));
        }

        return view('almacens.show')->with('almacen', $almacen);
    }

    /**
     * Show the form for editing the specified almacen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $almacen = $this->almacenRepository->findWithoutFail($id);

        if (empty($almacen)) {
            Flash::error('almacen not found');

            return redirect(route('almacens.index'));
        }

        return view('almacens.edit')->with('almacen', $almacen);
    }

    /**
     * Update the specified almacen in storage.
     *
     * @param  int              $id
     * @param UpdatealmacenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatealmacenRequest $request)
    {
        $almacen = $this->almacenRepository->findWithoutFail($id);

        if (empty($almacen)) {
            Flash::error('almacen not found');

            return redirect(route('almacens.index'));
        }

        $almacen = $this->almacenRepository->update($request->all(), $id);

        Flash::success('almacen updated successfully.');

        return redirect(route('almacens.index'));
    }

    /**
     * Remove the specified almacen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $almacen = $this->almacenRepository->findWithoutFail($id);

        if (empty($almacen)) {
            Flash::error('almacen not found');

            return redirect(route('almacens.index'));
        }

        $this->almacenRepository->delete($id);

        Flash::success('almacen deleted successfully.');

        return redirect(route('almacens.index'));
    }
}
