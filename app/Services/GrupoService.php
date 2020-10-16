<?php

namespace App\Services;

use App\Repositories\Contracts\GrupoRepositoryInterface;
use App\Services\Contracts\GrupoServiceInterface;

class GrupoService implements GrupoServiceInterface
{
    private $repository;

    public function __construct(GrupoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

}
