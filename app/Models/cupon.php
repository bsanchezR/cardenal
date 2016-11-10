<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="cupon",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="numero",
 *          description="numero",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="estado",
 *          description="estado",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="porcentaje",
 *          description="porcentaje",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="descuento",
 *          description="descuento",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="vigencia",
 *          description="vigencia",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipo",
 *          description="tipo",
 *          type="string"
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
class cupon extends Model
{
    use SoftDeletes;

    public $table = 'cupons';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'numero',
        'estado',
        'porcentaje',
        'descuento',
        'vigencia',
        'pedido_id',
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'numero' => 'integer',
        'estado' => 'string',
        'porcentaje' => 'integer',
        'descuento' => 'integer',
        'vigencia' => 'string',
        'tipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function pedido()
    {
      return $this->belongsTo('App\pedido');
    }
}
