<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateclienteRequest;
use App\Http\Requests\UpdateclienteRequest;
use App\Repositories\clienteRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class clienteController extends InfyOmBaseController
{
    /** @var  clienteRepository */
    private $clienteRepository;

    public function __construct(clienteRepository $clienteRepo)
    {
        $this->clienteRepository = $clienteRepo;
    }

    /**
     * Display a listing of the cliente.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clienteRepository->pushCriteria(new RequestCriteria($request));
        $cliente = $this->clienteRepository->all();

        // return view('user.index')
        //     ->with('users', $user);
        return view('cliente.clienteTabla')
            ->with('clientes', $cliente);
    }

    /**
     * Show the form for creating a new cliente.
     *
     * @return Response
     */
    public function create()
    {
        // return view('user.create');
        return view('cliente.clienteCrear');
    }

    /**
     * Store a newly created cliente in storage.
     *
     * @param CreateclienteRequest $request
     *
     * @return Response
     */
    public function store(CreateclienteRequest $request)
    {
        $input = $request->all();

        $cliente = $this->clienteRepository->create($input);

        Flash::success('Cliente guardado satisfactoriamente.');

        return redirect(route('cliente.index'));
    }

    /**
     * Display the specified cliente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('Cliente no encontrado');

            return redirect(route('cliente.index'));
        }

        // return view('user.show')->with('user', $user);
        return view('cliente.clienteVer')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified cliente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('cliente no encontrado');

            return redirect(route('cliente.index'));
        }
        //return view('user.edit',['user' => $user]);
        return view('cliente.clienteEditar',['cliente' => $cliente]);
    }

    /**
     * Update the specified cliente in storage.
     *
     * @param  int              $id
     * @param UpdateclienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclienteRequest $request)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('cliente no encontrado');

            return redirect(route('cliente.index'));
        }

        $cliente = $this->clienteRepository->update($request->all(), $id);

        Flash::success('cliente guardado satisfactoriamente.');

        return redirect(route('cliente.index'));
    }

    /**
     * Remove the specified cliente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('cliente no econtrado');

            return redirect(route('cliente.index'));
        }

        $this->clienteRepository->delete($id);

        Flash::success('cliente borrado satisfactoriamente.');

        return redirect(route('cliente.index'));
    }
}
