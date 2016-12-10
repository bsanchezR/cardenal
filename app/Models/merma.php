<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="merma",
 *      required={"nombre", "codigo", "marca", "tipo", "categoria", "precio", "color", "diametro", "largo", "ancho", "stock"},
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
 *          property="codigo",
 *          description="codigo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="marca",
 *          description="marca",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipo",
 *          description="tipo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="categoria",
 *          description="categoria",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="precio",
 *          description="precio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="color",
 *          description="color",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="diametro",
 *          description="diametro",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="largo",
 *          description="largo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ancho",
 *          description="ancho",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="stock",
 *          description="stock",
 *          type="integer",
 *          format="int32"
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
class merma extends Model
{
    use SoftDeletes;

    public $table = 'mermas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'codigo',
        'marca',
        'tipo',
        'categoria',
        'precio',
        'color',
        'diametro',
        'largo',
        'ancho',
        'stock'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'codigo' => 'string',
        'marca' => 'string',
        'tipo' => 'string',
        'categoria' => 'string',
        'precio' => 'string',
        'color' => 'string',
        'diametro' => 'string',
        'largo' => 'string',
        'ancho' => 'string',
        'stock' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'codigo' => 'required',
        'marca' => 'required',
        'tipo' => 'required',
        'categoria' => 'required',
        'precio' => 'required',
        'color' => 'required',
        'diametro' => 'required',
        'largo' => 'required',
        'ancho' => 'required',
        'stock' => 'required'
    ];
}
