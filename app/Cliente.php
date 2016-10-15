<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     use SoftDeletes;

     public $table = 'clientes';

    protected $fillable = [
      'nombre', 'email', 'direccion','telefono','telefono2','apellido_materno','apellido_paterno','tipo'
    ];


    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public static $rules = [
        'nombre' => 'required',
        'telefono' => 'required',
        'tipo' => 'required',
        'email' => 'required',
        'direccion' => 'required',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
    ];

    public function pedidos()
    {
      return $this->hasMany('App\Models\pedido');
    }
}
