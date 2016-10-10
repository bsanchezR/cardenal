<?php

namespace App\Repositories;

use App\User;
use InfyOm\Generator\Common\BaseRepository;

class userRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'telefono',
        'login',
        'tipo_usuario',
        'email',
        'password',
        'remember_token',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return user::class;
    }
}
