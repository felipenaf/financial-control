<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\ProdutoRequest;

interface ProdutoRepositoryInterface
{
    public function getAll();

    public function getById(int $id);

    public function store(ProdutoRequest $produto);

    public function update(ProdutoRequest $request, int $id);
}
