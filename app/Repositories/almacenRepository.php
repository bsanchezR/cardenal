<?php

namespace App\Repositories;

use App\Models\almacen;
use InfyOm\Generator\Common\BaseRepository;

class almacenRepository extends BaseRepository
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
        'diametro',
        'largo',
        'alto',
        'stock'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return almacen::class;
    }
}
