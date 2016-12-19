<?php

namespace App\Repositories;

use App\Models\cita_instala;
use InfyOm\Generator\Common\BaseRepository;

class cita_instalaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'hora',
        'cliente',
        'direccion',
        'creo',
        'notas',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return cita_instala::class;
    }
}
