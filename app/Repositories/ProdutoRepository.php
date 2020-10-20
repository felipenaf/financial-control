<?php

namespace App\Repositories;

use App\Http\Requests\ProdutoRequest;
use App\Produto;
use App\Repositories\Contracts\ProdutoRepositoryInterface;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    private $model;

    public function __construct(Produto $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function store(ProdutoRequest $request)
    {
        $produto = $this->model->fill($request->all());
        $produto->save();

        return $this->model::find($produto->id);
    }

}
