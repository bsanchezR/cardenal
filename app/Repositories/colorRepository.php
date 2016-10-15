<?php

namespace App\Repositories;

use App\color;
use InfyOm\Generator\Common\BaseRepository;

class colorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'codigo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return color::class;
    }
}
