<?php

namespace App\Services\Contracts;

use App\Http\Requests\ProdutoRequest;

interface ProdutoServiceInterface
{
    public function getAll();

    public function getById(int $id);

    public function store(ProdutoRequest $produto);

    public function update(ProdutoRequest $request, int $id);

    public function destroy(int $id);

}
