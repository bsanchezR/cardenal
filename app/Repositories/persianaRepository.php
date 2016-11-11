<?php

namespace App\Repositories;

use App\persiana;
use InfyOm\Generator\Common\BaseRepository;

class persianaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'largo',
        'observaciones',
        'alto',
        'ancho',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return persiana::class;
    }
}
