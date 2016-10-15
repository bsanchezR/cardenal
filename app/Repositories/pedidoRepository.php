<?php

namespace App\Repositories;

use App\pedido;
use InfyOm\Generator\Common\BaseRepository;

class pedidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cliente_id',
        'user_id',
        'folio',
        'control',
        'fecha_pedido',
        'fecha_entrega',
        'fecha_produccion',
        'fecha_instalacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pedido::class;
    }
}
