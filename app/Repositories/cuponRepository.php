<?php

namespace App\Repositories;

use App\Models\cupon;
use InfyOm\Generator\Common\BaseRepository;

class cuponRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numero',
        'estado',
        'porcentaje',
        'descuento',
        'vigencia',
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return cupon::class;
    }
}
