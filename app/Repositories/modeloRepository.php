<?php

namespace App\Repositories;

use App\modelo;
use InfyOm\Generator\Common\BaseRepository;

class modeloRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'marca_id',
        'codigo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return modelo::class;
    }
}
