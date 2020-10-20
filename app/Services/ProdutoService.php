<?php

namespace App\Services;

use App\Http\Requests\ProdutoRequest;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Services\Contracts\ProdutoServiceInterface;

class ProdutoService implements ProdutoServiceInterface
{
    private $repository;

    public function __construct(ProdutoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function store(ProdutoRequest $produto)
    {
        return $this->repository->store($produto);
    }

}
