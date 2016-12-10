<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepedidoRequest;
use App\Http\Requests\CreatepersianaRequest;
use App\Http\Requests\UpdatepedidoRequest;
use App\Repositories\pedidoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class comprasController extends InfyOmBaseController
{
    /** @var  pedidoRepository */
    private $pedidoRepository;

    public function __construct(pedidoRepository $pedidoRepo)
    {
        $this->middleware('auth');
        $this->pedidoRepository = $pedidoRepo;
    }

    /**
     * Display a listing of the pedido.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pedidoRepository->pushCriteria(new RequestCriteria($request));
      //   $pedidos = $this->pedidoRepository->all();
        $pedidos = \App\pedido::where('estado','=','compra')->get();
        foreach ($pedidos as $pedido )
        {
          if($pedido->fecha_entrega == NULL || $pedido->fecha_entrega == '' || $pedido->fecha_entrega == '-0001-11-30 00:00:00' || $pedido->fecha_entrega == '0000-00-00')
            $pedido->fecha_entrega = NULL;
          if($pedido->fecha_produccion == NULL || $pedido->fecha_produccion == '' || $pedido->fecha_produccion == '-0001-11-30 00:00:00' || $pedido->fecha_produccion == '0000-00-00')
            $pedido->fecha_produccion = NULL;
          if($pedido->fecha_instalacion == NULL || $pedido->fecha_instalacion == '' || $pedido->fecha_instalacion == '-0001-11-30 00:00:00' || $pedido->fecha_instalacion == '0000-00-00')
            $pedido->fecha_instalacion = NULL;
        }
        return view('compras.index')
            ->with('pedidos', $pedidos);
    }


    public function show($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);
        $pedido->cliente;

        if (empty($pedido)) {
            Flash::error('pedido not found');

            return redirect(route('compras.index'));
        }
        if($pedido->fecha_produccion == '0000-00-00')
          $pedido->fecha_produccion=null;
        $pedido->cliente;
        $pedido->user;
        if($pedido->fecha_entrega == NULL || $pedido->fecha_entrega == '' || $pedido->fecha_entrega == '-0001-11-30 00:00:00' || $pedido->fecha_entrega == '0000-00-00')
          $pedido->fecha_entrega = NULL;
        if($pedido->fecha_produccion == NULL || $pedido->fecha_produccion == '' || $pedido->fecha_produccion == '-0001-11-30 00:00:00' || $pedido->fecha_produccion == '0000-00-00')
          $pedido->fecha_produccion = NULL;
        if($pedido->fecha_instalacion == NULL || $pedido->fecha_instalacion == '' || $pedido->fecha_instalacion == '-0001-11-30 00:00:00' || $pedido->fecha_instalacion == '0000-00-00')
          $pedido->fecha_instalacion = NULL;

        $total=[];
        $cantidad=[];
        $final=[];
        $piezas=[];
        $telas=[];
        $metros=[];
        foreach ($pedido->persianas as $key )
        {
          if($key->motor == null)
          {
              $bandera = $this->stock($key->tipo, null);
          }
          else
          {
              $bandera = $this->stock($key->tipo, 1);
          }
          $nombre_s=$key->modelo->nombre.','.$key->modelo->color.','.$key->modelo->marca->nombre;
          $anchos=app ('App\Http\Controllers\almacenController')->anchos($nombre_s);
          for($i=0;$i<count($anchos);$i++)
          {
            if($key->ancho <= $anchos[$i])
            {
              $nombre_s = $nombre_s.','.$anchos[$i];
              break;
            }
          }
          $clav = array_search($nombre_s , $telas);
          if($clav !== false )
          {
            $metros[$clav]= $metros[$clav]+$key->alto;
          }
          else
          {
            $telas[]=$nombre_s;
            $metros[]=$key->alto;
          }
          for($j=0;$j<count($bandera);$j++)
          {
            $clave = array_search($bandera[$j] , $total);
            if($clave !== false )
            {
              $cantidad[$clave]++;
            }
            else
            {
              $total[]=$bandera[$j];
              $cantidad[]=1;
            }
          }
        }
        for($i=0;$i<count($total);$i++)
        {
          $ban = app ('App\Http\Controllers\almacenController')->faltan($total[$i],$cantidad[$i]);
          if($ban != null)
          {
            $final[]=$ban;
            $piezas[]=$cantidad[$i] - $ban->stock;
          }
        }
        for($i=0;$i<count($telas);$i++)
        {
          $ban = app ('App\Http\Controllers\almacenController')->faltan_telas($telas[$i] , $metros[$i]);
          if($ban != null)
          {
              $final[]=$ban;
              $piezas[]=$metros[$i];
          }
        }
        dd($total,$cantidad,$final,$piezas,$final == null,$telas,$metros);

        return view('compras.show',['pedido' => $pedido, 'persianas' => $pedido->persianas, 'lista' => $final, 'piezas' => $piezas, 'cuantos' => count($final)]);
    }

    /**
     * Show the form for editing the specified pedido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('pedido not found');

            return redirect(route('compras.index'));
        }

        $total=[];
        $cantidad=[];
        foreach ($pedido->persianas as $key )
        {
          if($key->motor == null)
          {
              $bandera = $this->stock($key->tipo, null);
          }
          else
          {
              $bandera = $this->stock($key->tipo, 1);
          }
          for($j=0;$j<count($bandera);$j++)
          {
            $clave = array_search($bandera[$j] , $total);
            if($clave !== false )
            {
              $cantidad[$clave]++;
            }
            else
            {
              $total[]=$bandera[$j];
              $cantidad[]=1;
            }
          }
        }
        for($i=0;$i<count($total);$i++)
        {
          $ban = app ('App\Http\Controllers\almacenController')->restar($total[$i],$cantidad[$i]);
        }

        $pedido->estado='produccion';
        $pedido->save();
        return redirect(route('compras.index'));
    }

    /**
     * Update the specified pedido in storage.
     *
     * @param  int              $id
     * @param UpdatepedidoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepedidoRequest $request)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('pedido not found');

            return redirect(route('compras.index'));
        }
        if($request->fecha_entrega == NULL || $request->fecha_entrega == '' || $request->fecha_entrega == '-0001-11-30 00:00:00' || $request->fecha_entrega == '0000-00-00')
          $request->fecha_entrega = NULL;
        if($request->fecha_produccion == NULL || $request->fecha_produccion == '' || $request->fecha_produccion == '-0001-11-30 00:00:00' || $request->fecha_entrega == '0000-00-00')
          $request->fecha_produccion = NULL;
        if($request->fecha_instalacion == NULL || $request->fecha_instalacion == '' || $request->fecha_instalacion == '-0001-11-30 00:00:00' || $request->fecha_entrega == '0000-00-00')
          $request->fecha_instalacion = NULL;
        $pedido = $this->pedidoRepository->update($request->all(), $id);

        Flash::success('Pedido actualizado !!!.');

        return redirect(route('compras.index'));
    }

    /**
     * Remove the specified pedido from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('compra not found');

            return redirect(route('compras.index'));
        }

        $this->pedidoRepository->delete($id);

        Flash::success('Compra borrado !!!.');

        return redirect(route('compras.index'));
    }

    public function sheer()
    {
      $precio=[
        'Tejido',
        'Tubo 38 mm',
        'R8',
        'Facia 100',
        'Tapas laterales',
        'Soporte',
        'Contrapeso redondo',
        'Contrapeso cerrado',
        'Tapas laterales para contrapeso',
        'Cadena bola continua',
        'Tope plastico',
        'Conector de cadena chocolate',
        'Contrapeso para cadena',
        'Brackets'
      ];
      return $precio;
    }

    public function sheer_motor()
    {
      $precio=[
        'Tejido',
        'Tubo 44 mm',
        'Motor enrrollable',
        'Facia 120',
        'Tapas laterales',
        'Soporte',
        'Base tubular',
        'Tapas para base tubular',
        'Contrapeso redondo',
        'Contrapeso cerrado',
        'Tapas laterales para contrapeso',
        'Brackets'
      ];
      return $precio;
    }

    public function enrrollable()
    {
      $precio=[
        'Tejido',
        'Tubo 38 mm',
        'R8',
        'Tensor para cadena',
        'Base ovalada',
        'Inserto plastico',
        'Tapas para base ovalada',
        'Soporte',
        'Cadena bola continua',
        'Tope plastico',
        'Conector de cadena chocolate',
        'Contrapeso para cadena'
      ];
      return $precio;
    }

    public function enrrollable_motor()
    {
      $precio=[
        'Tejido',
        'Tubo 44 mm',
        'R8',
        'Motor enrrollable',
        'Facia 120',
        'Base tubular',
        'Tapas para base tubular',
        'Soporte',
        'Inserto plastico'
      ];
      return $precio;
    }

    public function vertical()
    {
      $precio=[
        'Tejido',
        'Riel con piñon',
        'Carro de arrastre',
        'Percha plastica',
        'Cadena bola continua',
        'Contrapeso para cadena',
        'Control manual',
        'Seguro estrella',
        'Seguro C',
        'Eje dummy',
        'Tensor para cadena',
        'Cordon',
        'Carro maestro',
        'Clip para soporte',
        'Control para sistema vertical',
        'Peso para sistema vertical',
        'Conector de cadena chocolate'
      ];
      return $precio;
    }

    public function shangrila()
    {
      $precio=[
        'Tejido',
        'Tubo 38 mm',
        'Facia 100',
        'Perfileria (shangri-la)',
        'Tapas laterales para facia',
        'Cadena bola continua',
        'Conector de cadena chocolate',
        'Contrapeso para cadena',
        'Tope plastico'
      ];
      return $precio;
    }

    public function shangrila_motor()
    {
      $precio=[
        'Tejido',
        'Tubo 44 mm',
        'Facia 120',
        'Motor enrrollable',
        'Base tubular',
        'Tapas para base tubular',
        'Perfileria (shangri-la)',
        'Tapas laterales para facia',
        'Soporte'
      ];
      return $precio;
    }

    public function stock($tipo,$motor)
    {
      $precio=0;
      switch ($tipo)
      {
        case 'sheer': if($motor == null)
                      {
                        $precio = $this->sheer();
                      }
                      else
                      {
                        $precio = $this->sheer_motor();
                      }
                      break;
        case 'enrrollable': if($motor == null)
                            {
                              $precio = $this->enrrollable();
                            }
                            else
                            {
                              $precio = $this->enrrollable_motor();
                            }
                      break;
        case 'vertical':  $precio = $this->vertical();
                          break;
        case 'shangri-la':  if($motor == null)
                            {
                                $precio = $this->shangrila();
                            }
                            else
                            {
                              $precio = $this->shangrila_motor();
                            }
                      break;
      }
      return $precio;
    }

}
