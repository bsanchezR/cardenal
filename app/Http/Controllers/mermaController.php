<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemermaRequest;
use App\Http\Requests\UpdatemermaRequest;
use App\Repositories\mermaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class mermaController extends InfyOmBaseController
{
    /** @var  mermaRepository */
    private $mermaRepository;

    public function __construct(mermaRepository $mermaRepo)
    {
        $this->mermaRepository = $mermaRepo;
    }

    /**
     * Display a listing of the merma.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->mermaRepository->pushCriteria(new RequestCriteria($request));
        $mermas = $this->mermaRepository->all();

        return view('mermas.index')
            ->with('mermas', $mermas);
    }

    /**
     * Show the form for creating a new merma.
     *
     * @return Response
     */
    public function create()
    {
        return view('mermas.create');
    }

    /**
     * Store a newly created merma in storage.
     *
     * @param CreatemermaRequest $request
     *
     * @return Response
     */
    public function store(CreatemermaRequest $request)
    {
        $input = $request->all();

        $merma = $this->mermaRepository->create($input);

        Flash::success('merma saved successfully.');

        return redirect(route('mermas.index'));
    }

    /**
     * Display the specified merma.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $merma = $this->mermaRepository->findWithoutFail($id);

        if (empty($merma)) {
            Flash::error('merma not found');

            return redirect(route('mermas.index'));
        }

        return view('mermas.show')->with('merma', $merma);
    }

    /**
     * Show the form for editing the specified merma.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $merma = $this->mermaRepository->findWithoutFail($id);

        if (empty($merma)) {
            Flash::error('merma not found');

            return redirect(route('mermas.index'));
        }

        return view('mermas.edit')->with('merma', $merma);
    }

    /**
     * Update the specified merma in storage.
     *
     * @param  int              $id
     * @param UpdatemermaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemermaRequest $request)
    {
        $merma = $this->mermaRepository->findWithoutFail($id);

        if (empty($merma)) {
            Flash::error('merma not found');

            return redirect(route('mermas.index'));
        }

        $merma = $this->mermaRepository->update($request->all(), $id);

        Flash::success('merma updated successfully.');

        return redirect(route('mermas.index'));
    }

    /**
     * Remove the specified merma from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $merma = $this->mermaRepository->findWithoutFail($id);

        if (empty($merma)) {
            Flash::error('merma not found');

            return redirect(route('mermas.index'));
        }

        $this->mermaRepository->delete($id);

        Flash::success('merma deleted successfully.');

        return redirect(route('mermas.index'));
    }
}
