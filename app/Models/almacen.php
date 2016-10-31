<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="almacen",
 *      required={"nombre", "codigo", "marca", "tipo", "categoria", "precio", "color", "stock"},
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
 *          property="alto",
 *          description="alto",
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
class almacen extends Model
{
    use SoftDeletes;

    public $table = 'almacens';


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
        'alto',
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
        'alto' => 'string',
        'stock' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required:max: 30',
        'codigo' => 'required|max:30',
        'marca' => 'required|max: 30',
        'tipo' => 'required|max: 30',
        'categoria' => 'required|max: 30',
        'precio' => 'required|max:30',
        'color' => 'required|max:30',
        'diametro' => 'max:30',
        'largo' => 'max:30',
        'alto' => 'max:30',
        'stock' => 'required'
    ];
}
