<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class persiana
 * @package App\Models
 */
class persiana extends Model
{
    use SoftDeletes;

    public $table = 'persianas';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'modelo_id',
        'pedido_id',
        'color_id',
        'vinculacion',
        'tipo',
        'subtipo',
        'control_p',
        'motor',
        'soporte_u',
        'soporte_m',
        'soporte_a',
        'soporte_p',
        'tipo_motor',
        'lado_motor',
        'altura_control',
        'area',
        'color',
        'observaciones',
        'alto',
        'ancho'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'modelo_id' => 'integer',
        'color_id' => 'integer',
        'pedido_id'=> 'integer',
        'area' => 'string',
        'observaciones' => 'string',
        'alto' => 'double',
        'ancho' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array // 'subtipo' => 'required',
     */
    public static $rules = [
        'modelo_id' => 'required',
        'pedido_id' => 'required',
        'tipo' => 'required',
        'control_p' => 'required',
        'soporte_u' => 'required',
        'soporte_m' => 'required',
        'soporte_p' => 'required',
        'alto' => 'required',
        'ancho' => 'required'
    ];

  public function modelo()
  {
    return $this->belongsTo('App\modelo');
  }
  public function pedido()
	{
		return $this->belongsTo('App\pedido');
	}
  public function color()
	{
		return $this->belongsTo('App\color');
	}
}
