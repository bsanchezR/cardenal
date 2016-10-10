<?php

namespace App\Repositories;

use App\Cliente;
use InfyOm\Generator\Common\BaseRepository;

class clienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'telefono2',
        'email',
        'tipo',
        'direccion',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return cliente::class;
    }
}
