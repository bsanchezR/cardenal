<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="modelo",
 *      required={nombre, color_id, marca_id, codigo},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="color_id",
 *          description="color_id",
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
 *          property="codigo",
 *          description="codigo",
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
class images extends Model
{
    use SoftDeletes;

    public $table = 'images';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'pedidos_id',
        'contenido'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pedido_id' => 'integer',
        'contenido' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pedido_id' => 'required',
        'contenido' => 'required'
    ];

    // public function colors()
  	// {
  	// 	return $this->belongsToMany('App\color')->withTimestamps();
  	// }

    public function pedido()
  	{
  		return $this->belongsTo('App\pedido');
  	}

}
