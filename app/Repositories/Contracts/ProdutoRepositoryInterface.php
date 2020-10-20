<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\ProdutoRequest;

interface ProdutoRepositoryInterface
{
    public function getAll();

    public function store(ProdutoRequest $produto);
}
