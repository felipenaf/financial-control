<?php

namespace App\Repositories\Contracts;

interface ProdutoRepositoryInterface
{
    public function getAll();

    public function store($produto);
}
