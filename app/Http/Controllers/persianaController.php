<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepersianaRequest;
use App\Http\Requests\UpdatepersianaRequest;
use App\Repositories\persianaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class persianaController extends InfyOmBaseController
{
    /** @var  persianaRepository */
    private $persianaRepository;

    public function __construct(persianaRepository $persianaRepo)
    {
        $this->persianaRepository = $persianaRepo;
    }

    /**
     * Display a listing of the persiana.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->persianaRepository->pushCriteria(new RequestCriteria($request));
        $persianas = $this->persianaRepository->all();

        return view('persianas.index')
            ->with('persianas', $persianas);
    }

    /**
     * Show the form for creating a new persiana.
     *
     * @return Response
     */
    public function create()
    {
        $pedidos = \App\pedido::all();
        $modelos = \App\modelo::all();
        foreach ($modelos as $key )
        {
          $key->colors;
        }
        return view('persianas.create',['pedidos'=> $pedidos , 'modelos'=> $modelos]);
    }

    /**
     * Store a newly created persiana in storage.
     *
     * @param CreatepersianaRequest $request
     *
     * @return Response
     */
    public function store(CreatepersianaRequest $request)
    {
        $input = $request->all();

        $persiana = $this->persianaRepository->create($input);

        Flash::success('persiana saved successfully.');

        return redirect(route('persianas.index'));
    }

    /**
     * Display the specified persiana.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $persiana = $this->persianaRepository->findWithoutFail($id);

        if (empty($persiana)) {
            Flash::error('persiana not found');

            return redirect(route('persianas.index'));
        }
        return view('persianas.show')->with('persiana', $persiana);
    }

    /**
     * Show the form for editing the specified persiana.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $persiana = $this->persianaRepository->findWithoutFail($id);

        if (empty($persiana)) {
            Flash::error('persiana not found');

            return redirect(route('persianas.index'));
        }
        $pedidos = \App\pedido::all();
        $modelos = \App\modelo::all();
        foreach ($modelos as $key )
        {
          $key->colors;
        }
        return view('persianas.edit' ,['persiana' => $persiana ,'pedidos'=> $pedidos , 'modelos'=> $modelos]);
    }

    /**
     * Update the specified persiana in storage.
     *
     * @param  int              $id
     * @param UpdatepersianaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepersianaRequest $request)
    {
        $persiana = $this->persianaRepository->findWithoutFail($id);

        if (empty($persiana)) {
            Flash::error('persiana not found');

            return redirect(route('persianas.index'));
        }

        $persiana = $this->persianaRepository->update($request->all(), $id);

        Flash::success('persiana updated successfully.');

        return redirect(route('persianas.index'));
    }

    /**
     * Remove the specified persiana from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $persiana = $this->persianaRepository->findWithoutFail($id);

        if (empty($persiana)) {
            Flash::error('persiana not found');

            return redirect(route('persianas.index'));
        }

        $this->persianaRepository->delete($id);

        Flash::success('persiana deleted successfully.');

        return redirect(route('persianas.index'));
    }
}
