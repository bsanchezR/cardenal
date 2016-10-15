<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     use SoftDeletes;

    protected $fillable = [
      'name', 'email', 'password','telefono','login','tipo_usuario'
    ];


    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => 'required',
        'telefono' => 'required',
        'tipo_usuario' => 'required',
        'email' => 'required',
    ];

    public function pedidos()
    {
	    return $this->hasMany('App\Models\pedido');
    }
}
