<?php

namespace App\Repositories;

use App\marca;
use InfyOm\Generator\Common\BaseRepository;

class marcaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return marca::class;
    }
}
