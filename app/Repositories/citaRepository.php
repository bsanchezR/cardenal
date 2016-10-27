<?php

namespace App\Repositories;

use App\Models\cita;
use InfyOm\Generator\Common\BaseRepository;

class citaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'fecha',
        'hora',
        'id_cliente',
        'notas',
        'asignar'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return cita::class;
    }
}
