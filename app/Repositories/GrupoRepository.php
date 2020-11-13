<?php

namespace App\Repositories;

use App\Models\Grupo;
use App\Repositories\Contracts\GrupoRepositoryInterface;

class GrupoRepository implements GrupoRepositoryInterface
{
    private $model;

    public function __construct(Grupo $model)
    {
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

}
