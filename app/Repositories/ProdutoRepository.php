<?php

namespace App\Repositories;

use App\Produto;
use App\Repositories\Contracts\ProdutoRepositoryInterface;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    private $model;

    public function __construct(Produto $model)
    {
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

}
