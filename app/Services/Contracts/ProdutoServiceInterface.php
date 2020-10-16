<?php

namespace App\Services\Contracts;

interface ProdutoServiceInterface
{
    public function getAll();

    public function store($produto);
}
