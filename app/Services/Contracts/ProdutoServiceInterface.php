<?php

namespace App\Services\Contracts;

use App\Http\Requests\ProdutoRequest;

interface ProdutoServiceInterface
{
    public function getAll();

    public function store(ProdutoRequest $produto);
}
