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
        return $this->model->with(['grupo'])->get();
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    public function store(ProdutoRequest $request)
    {
        $produto = $this->model->fill($request->all());
        $produto->save();

        return $this->model::find($produto->id);
    }

    public function update(ProdutoRequest $request, int $id)
    {
        $produto = $this->model->find($id);

        if (empty($produto)) {
            return null;
        }

        $produto->fill($request->except([
            'id', 'id_usuario', 'data_modificacao'
        ]));

        $produto->save();

        return $produto;
    }

    public function destroy(int $id)
    {
        $produto = $this->model->find($id);

        if (empty($produto)) {
            return false;
        }

        return $produto->delete();
    }

}
