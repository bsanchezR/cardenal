<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="pedido",
 *      required={marca_id, modelo_id, cliente_id, user_id, folio, control, soporte, area, observaciones, alto, ancho, fecha_pedido},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="marca_id",
 *          description="marca_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="modelo_id",
 *          description="modelo_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cliente_id",
 *          description="cliente_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="folio",
 *          description="folio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="control",
 *          description="control",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="soporte",
 *          description="soporte",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="area",
 *          description="area",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="observaciones",
 *          description="observaciones",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alto",
 *          description="alto",
 *          type="number",
 *          format="double"
 *      ),
 *      @SWG\Property(
 *          property="ancho",
 *          description="ancho",
 *          type="number",
 *          format="double"
 *      ),
 *      @SWG\Property(
 *          property="fecha_pedido",
 *          description="fecha_pedido",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="fecha_entrega",
 *          description="fecha_entrega",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="fecha_produccion",
 *          description="fecha_produccion",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="fecha_instalacion",
 *          description="fecha_instalacion",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class pedido extends Model
{
    use SoftDeletes;

    public $table = 'pedidos';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cliente_id',
        'user_id',
        'folio',
        'control',
        'fecha_pedido',
        'fecha_entrega',
        'fecha_produccion',
        'fecha_instalacion',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cliente_id' => 'integer',
        'user_id' => 'integer',
        'folio' => 'string',
        'control' => 'string',
        'fecha_pedido' => 'date',
        'fecha_entrega' => 'date',
        'fecha_produccion' => 'date',
        'fecha_instalacion' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cliente_id' => 'required',
        'user_id' => 'required',
        'folio' => 'required',
        'fecha_pedido' => 'required'
    ];

    public function cliente()
  	{
  		return $this->belongsTo('App\Cliente');
  	}

    public function persianas()
    {
	    return $this->hasMany('App\persiana');
    }

    public function images()
    {
	    return $this->hasMany('App\images');
    }

    public function user()
  	{
  		return $this->belongsTo('App\User');
  	}
}
