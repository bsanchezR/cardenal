<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateuserRequest;
use App\Http\Requests\UpdateuserRequest;
use App\Repositories\userRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class userController extends InfyOmBaseController
{
    /** @var  clienteRepository */
    private $userRepository;

    public function __construct(userRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the cliente.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $user = $this->userRepository->all();

        // return view('user.index')
        //     ->with('users', $user);
        return view('usuario.usuarioTabla')
            ->with('users', $user);
    }

    /**
     * Show the form for creating a new cliente.
     *
     * @return Response
     */
    public function create()
    {
        // return view('user.create');
        return view('usuario.usuarioCrear');
    }

    /**
     * Store a newly created cliente in storage.
     *
     * @param CreateclienteRequest $request
     *
     * @return Response
     */
    public function store(CreateuserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('user saved successfully.');

        return redirect(route('user.index'));
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
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('user.index'));
        }

        // return view('user.show')->with('user', $user);
        return view('usuario.usuarioVer')->with('user', $user);
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
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('user.index'));
        }
        //return view('user.edit',['user' => $user]);
        return view('usuario.usuarioEditar',['user' => $user]);
    }

    /**
     * Update the specified cliente in storage.
     *
     * @param  int              $id
     * @param UpdateclienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateuserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('user.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('user updated successfully.');

        return redirect(route('user.index'));
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
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('user.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('user deleted successfully.');

        return redirect(route('user.index'));
    }
}
