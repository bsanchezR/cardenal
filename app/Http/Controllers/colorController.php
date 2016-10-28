<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecolorRequest;
use App\Http\Requests\UpdatecolorRequest;
use App\Repositories\colorRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class colorController extends InfyOmBaseController
{
    /** @var  colorRepository */
    private $colorRepository;

    public function __construct(colorRepository $colorRepo)
    {
        $this->middleware('auth');
        $this->colorRepository = $colorRepo;
    }

    /**
     * Display a listing of the color.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->colorRepository->pushCriteria(new RequestCriteria($request));
        $colors = $this->colorRepository->all();

        return view('colors.index')
            ->with('colors', $colors);
    }

    /**
     * Show the form for creating a new color.
     *
     * @return Response
     */
    public function create()
    {
        $modelos = \App\modelo::all();
        return view('colors.create',['modelos' => $modelos]);
    }

    /**
     * Store a newly created color in storage.
     *
     * @param CreatecolorRequest $request
     *
     * @return Response
     */
    public function store(CreatecolorRequest $request)
    {
        $input = $request->all();

        $color = $this->colorRepository->create($input);

        $modelo=\App\modelo::find($request->input('modelo_id'));

        $modelo->colors()->attach($color);

        Flash::success('color saved successfully.');

        return redirect(route('colors.index'));
    }

    /**
     * Display the specified color.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            Flash::error('color not found');

            return redirect(route('colors.index'));
        }

        return view('colors.show')->with('color', $color);
    }

    /**
     * Show the form for editing the specified color.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            Flash::error('color not found');

            return redirect(route('colors.index'));
        }
        $modelos = \App\modelo::all();
        return view('colors.edit',['color' => $color,'modelos' => $modelos]);
    }

    /**
     * Update the specified color in storage.
     *
     * @param  int              $id
     * @param UpdatecolorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecolorRequest $request)
    {
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            Flash::error('color not found');

            return redirect(route('colors.index'));
        }

        $color = $this->colorRepository->update($request->all(), $id);

        $color->modelos;
        $bandera=0;
        if($color->modelos !=null)
        {
          foreach ($color->modelos as $key )
          {
            if($key->id ==  $request->input('modelo_id') )
              $bandera=1;
          }

        }
        if($bandera == 0)
        {
          $modelo=\App\modelo::find($request->input('modelo_id'));

          $modelo->colors()->attach($color);
        }
        Flash::success('color updated successfully.');

        return redirect(route('colors.index'));
    }

    /**
     * Remove the specified color from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            Flash::error('color not found');

            return redirect(route('colors.index'));
        }

        $this->colorRepository->delete($id);

        Flash::success('color deleted successfully.');

        return redirect(route('colors.index'));
    }
}
