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

    public function existe ($nombre)
    {
      $material = $material = \App\Models\almacen::where([['nombre','=', $nombre],['stock','<>','0']])->get()->first();
      return $material;
    }

    public function almacen_sheer()
    {
      $precio;
      $precio =  $this->existe('Tejido');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tubo 38 mm');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('R8');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Facia 100');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tapas laterales');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Soporte');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Contrapeso redondo');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Contrapeso cerrado');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tapas laterales para contrapeso');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Cadena bola continua');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tope plastico');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Conector de cadena chocolate');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Contrapeso para cadena');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Brackets');
      if($precio == null)
      {
        return null;
      }
      return true;
    }

    public function almacen_sheer_motor()
    {
      $precio;
      $precio =  $this->existe('Tejido');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tubo 44 mm');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Motor enrrollable');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Facia 120');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tapas laterales');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Soporte');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Base tubular');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tapas para base tubular');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Contrapeso redondo');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Contrapeso cerrado');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tapas laterales para contrapeso');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Brackets');
      if($precio == null)
      {
        return null;
      }
      return true;
    }

    public function almacen_enrrollable()
    {
      $precio;
      $precio =  $this->existe('Tejido');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tubo 38 mm');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('R8');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tensor para cadena');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Base ovalada');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Inserto plastico');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tapas para base ovalada');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Soporte');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Cadena bola continua');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tope plastico');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Conector de cadena chocolate');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Contrapeso para cadena');
      if($precio == null)
      {
        return null;
      }
      return true;
    }

    public function almacen_enrrollable_motor()
    {
      $precio;
      $precio =  $this->existe('Tejido');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tubo 44 mm');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Motor enrrollable');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Facia 120');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Base tubular');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tapas para base tubular');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Inserto plastico');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Soporte');
      if($precio == null)
      {
        return null;
      }
      return true;
    }

    public function almacen_vertical()
    {
      $precio;
      $precio =  $this->existe('Tejido');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Riel con piñon');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Carro de arrastre');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Percha plastica');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Cadena bola continua');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Contrapeso para cadena');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Control manual');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Seguro estrella');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Seguro C');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Eje dummy');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tensor para cadena');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Cordon');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Carro maestro');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Clip para soporte');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Control para sistema vertical');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Peso para sistema vertical');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Conector de cadena chocolate');
      if($precio == null)
      {
        return null;
      }
      return true;
    }

    public function almacen_shangrila()
    {
      $precio;
      $precio =  $this->existe('Tejido');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tubo 38 mm');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Facia 100');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Perfileria (shangri-la)');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tapas laterales para facia');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Cadena bola continua');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Conector de cadena chocolate');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Contrapeso para cadena');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tope plastico');
      if($precio == null)
      {
        return null;
      }
      return true;
    }

    public function almacen_shangrila_motor()
    {
      $precio;
      $precio =  $this->existe('Tejido');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tubo 44 mm');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Motor enrrollable');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Facia 120');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Base tubular');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tapas para base tubular');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Perfileria (shangri-la)');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Tapas laterales para facia');
      if($precio == null)
      {
        return null;
      }
      $precio =  $this->existe('Soporte');
      if($precio == null)
      {
        return null;
      }
      return true;
    }

    public function cuanto ($nombre)
    {
      $material = $material = \App\Models\almacen::where('nombre','=', $nombre)->get()->first();
      return $material->precio;
    }
    public function sheer($alto)
    {
      $precio=0;
      $precio = $precio + ($this->cuanto('Tejido')*($alto*2));
      $precio = $precio + $this->cuanto('Tubo 38 mm');
      $precio = $precio + $this->cuanto('R8');
      $precio = $precio + $this->cuanto('Facia 100');
      $precio = $precio + $this->cuanto('Tapas laterales');
      $precio = $precio + $this->cuanto('Soporte');
      $precio = $precio + $this->cuanto('Contrapeso redondo');
      $precio = $precio + $this->cuanto('Contrapeso cerrado');
      $precio = $precio + $this->cuanto('Tapas laterales para contrapeso');
      $precio = $precio + $this->cuanto('Cadena bola continua');
      $precio = $precio + $this->cuanto('Tope plastico');
      $precio = $precio + $this->cuanto('Conector de cadena chocolate');
      $precio = $precio + $this->cuanto('Contrapeso para cadena');
      $precio = $precio + $this->cuanto('Brackets');
      return $precio;
    }

    public function sheer_motor($alto,$motor)
    {
      $precio=0;
      $precio = $precio + ($this->cuanto('Tejido')*($alto*2));
      $precio = $precio + $this->cuanto('Tubo 44 mm');
      $precio = $precio + $this->cuanto('Motor enrrollable');
      $precio = $precio + $this->cuanto('Facia 120');
      $precio = $precio + $this->cuanto('Tapas laterales');
      $precio = $precio + ($motor-1)*($this->cuanto('Soporte'));
      $precio = $precio + $this->cuanto('Base tubular');
      $precio = $precio + $this->cuanto('Tapas para base tubular');
      $precio = $precio + $this->cuanto('Contrapeso redondo');
      $precio = $precio + $this->cuanto('Contrapeso cerrado');
      $precio = $precio + $this->cuanto('Tapas laterales para contrapeso');
      $precio = $precio + $this->cuanto('Brackets');
      return $precio;
    }

    public function enrrollable($alto)
    {
      $precio=0;
      $precio = $precio + ($this->cuanto('Tejido')*$alto);
      $precio = $precio + $this->cuanto('Tubo 38 mm');
      $precio = $precio + $this->cuanto('R8');
      $precio = $precio + $this->cuanto('Tensor para cadena');
      $precio = $precio + $this->cuanto('Base ovalada');
      $precio = $precio + $this->cuanto('Inserto plastico');
      $precio = $precio + $this->cuanto('Tapas para base ovalada');
      $precio = $precio + $this->cuanto('Soporte');
      $precio = $precio + $this->cuanto('Cadena bola continua');
      $precio = $precio + $this->cuanto('Tope plastico');
      $precio = $precio + $this->cuanto('Conector de cadena chocolate');
      $precio = $precio + $this->cuanto('Contrapeso para cadena');
      return $precio;
    }

    public function enrrollable_motor($alto,$motor)
    {
      $precio=0;
      $precio = $precio + ($this->cuanto('Tejido')*$alto);
      $precio = $precio + $this->cuanto('Tubo 44 mm');
      $precio = $precio + $this->cuanto('Motor enrrollable');
      $precio = $precio + $this->cuanto('Facia 120');
      $precio = $precio + $this->cuanto('Base tubular');
      $precio = $precio + $this->cuanto('Tapas para base tubular');
      $precio = $precio + $this->cuanto('Inserto plastico');
      $precio = $precio + ($motor-1)*($this->cuanto('Soporte'));
      return $precio;
    }

    public function vertical($alto)
    {
      $precio=0;
      $precio = $precio + ($this->cuanto('Tejido')*$alto);
      $precio = $precio + $this->cuanto('Riel con piñon');
      $precio = $precio + $this->cuanto('Carro de arrastre');
      $precio = $precio + $this->cuanto('Percha plastica');
      $precio = $precio + $this->cuanto('Cadena bola continua');
      $precio = $precio + $this->cuanto('Contrapeso para cadena');
      $precio = $precio + $this->cuanto('Control manual');
      $precio = $precio + $this->cuanto('Seguro estrella');
      $precio = $precio + $this->cuanto('Seguro C');
      $precio = $precio + $this->cuanto('Eje dummy');
      $precio = $precio + $this->cuanto('Tensor para cadena');
      $precio = $precio + $this->cuanto('Cordon');
      $precio = $precio + $this->cuanto('Carro maestro');
      $precio = $precio + $this->cuanto('Clip para soporte');
      $precio = $precio + $this->cuanto('Control para sistema vertical');
      $precio = $precio + $this->cuanto('Peso para sistema vertical');
      $precio = $precio + $this->cuanto('Conector de cadena chocolate');

      return $precio;
    }

    public function shangrila($alto)
    {
      $precio=0;
      $precio = $precio + ($this->cuanto('Tejido')*$alto);
      $precio = $precio + $this->cuanto('Tubo 38 mm');
      $precio = $precio + $this->cuanto('Facia 100');
      $precio = $precio + $this->cuanto('Perfileria (shangri-la)');
      $precio = $precio + $this->cuanto('Tapas laterales para facia');
      $precio = $precio + $this->cuanto('Cadena bola continua');
      $precio = $precio + $this->cuanto('Conector de cadena chocolate');
      $precio = $precio + $this->cuanto('Contrapeso para cadena');
      $precio = $precio + $this->cuanto('Tope plastico');
      return $precio;
    }

    public function shangrila_motor($alto,$motor)
    {
      $precio=0;
      $precio = $precio + ($this->cuanto('Tejido')*$alto);
      $precio = $precio + $this->cuanto('Tubo 44 mm');
      $precio = $precio + $this->cuanto('Motor enrrollable');
      $precio = $precio + $this->cuanto('Facia 120');
      $precio = $precio + $this->cuanto('Base tubular');
      $precio = $precio + $this->cuanto('Tapas para base tubular');
      $precio = $precio + $this->cuanto('Perfileria (shangri-la)');
      $precio = $precio + $this->cuanto('Tapas laterales para facia');
      $precio = $precio + ($motor-1)*($this->cuanto('Soporte'));
      return $precio;
    }

    public function precios($tipo,$alto,$motor)
    {
      $precio=0;
      switch ($tipo)
      {
        case 'sheer': if($motor == null)
                      {
                        $precio = $this->sheer($alto);
                      }
                      else
                      {
                        $precio = $this->sheer_motor($alto,$motor);
                      }
                      break;
        case 'enrrollable': if($motor == null)
                            {
                              $precio = $this->enrrollable($alto);
                            }
                            else
                            {
                              $precio = $this->enrrollable_motor($alto,$motor);
                            }
                      break;
        case 'vertical':  $precio = $this->vertical($alto);
                          break;
        case 'shangri-la':  if($motor == null)
                            {
                                $precio = $this->shangrila($alto);
                            }
                            else
                            {
                              $precio = $this->shangrila_motor($alto,$motor);
                            }
                      break;
      }
      return $precio;
    }

    public function stock($tipo,$motor)
    {
      $precio=0;
      switch ($tipo)
      {
        case 'sheer': if($motor == null)
                      {
                        $precio = $this->almacen_sheer();
                      }
                      else
                      {
                        $precio = $this->almacen_sheer_motor();
                      }
                      break;
        case 'enrrollable': if($motor == null)
                            {
                              $precio = $this->almacen_enrrollable();
                            }
                            else
                            {
                              $precio = $this->almacen_enrrollable_motor();
                            }
                      break;
        case 'vertical':  $precio = $this->almacen_vertical();
                          break;
        case 'shangri-la':  if($motor == null)
                            {
                                $precio = $this->almacen_shangrila();
                            }
                            else
                            {
                              $precio = $this->almacen_shangrila_motor();
                            }
                      break;
      }
      return $precio;
    }
}
