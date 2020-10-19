<?php

namespace App\Repositories;

use App\Conta;
use App\Http\Requests\ContaRequest;
use App\Repositories\Contracts\ContaRepositoryInterface;

class ContaRepository implements ContaRepositoryInterface
{
    private $model;

    public function __construct(Conta $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model::paginate(10);
    }

    public function getById(int $id)
    {
        return $this->model::find($id);
    }

    public function save(ContaRequest $request)
    {
        $conta = $this->model->fill($request->all());
        $conta->save();

        return $this->model::find($conta->id);
    }

}
