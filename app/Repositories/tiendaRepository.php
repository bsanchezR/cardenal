<?php

namespace App\Repositories;

use App\tienda;
use InfyOm\Generator\Common\BaseRepository;

class tiendaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'horario',
        'telefono',
        'direccion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tienda::class;
    }
}
