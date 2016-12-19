<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="cita",
 *      required={"titulo", "fecha", "hora", "id_cliente", "notas"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="titulo",
 *          description="titulo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fecha",
 *          description="fecha",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="id_cliente",
 *          description="id_cliente",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="notas",
 *          description="notas",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="asignar",
 *          description="asignar",
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
class cita_instala extends Model
{
    use SoftDeletes;

    public $table = 'citas_instalaciones';


    protected $dates = ['deleted_at'];


    public $fillable = [
        //'titulo',
        'fecha',
        'hora',
        'cliente',
        'direccion',
        'notas',
        'completado',
        'asigno',
        'creo',
        'pedido_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'titulo' => 'string',
        'fecha' => 'date',
        'notas' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'titulo' => 'required|max: 50',
        'fecha' => 'required',
        'hora' => 'required',
    ];

    public function user()
  	{
  		return $this->belongsTo('App\User');
  	}

    public function pedido()
  	{
  		return $this->belongsTo('App\pedido');
  	}
}
