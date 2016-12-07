<?php

namespace App\Repositories;

use App\Models\merma;
use InfyOm\Generator\Common\BaseRepository;

class mermaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'codigo',
        'marca',
        'tipo',
        'categoria',
        'precio',
        'color',
        'diametro',
        'largo',
        'ancho',
        'stock'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return merma::class;
    }
}
