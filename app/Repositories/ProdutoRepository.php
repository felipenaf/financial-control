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

    public function getAll() {
        return $this->model->all();
    }

    public function store($produto) {
        $this->model->id_grupo = $produto->id_grupo;
        $this->model->id_usuario = $produto->id_usuario;
        $this->model->valor = $produto->valor;
        $this->model->descricao = $produto->descricao;

        return $this->model->save();
    }

}
