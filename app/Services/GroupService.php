<?php

namespace App\Services;

use App\Repositories\Contracts\GroupRepositoryInterface;
use App\Services\Contracts\GroupServiceInterface;

class GroupService implements GroupServiceInterface
{
    private $repository;

    public function __construct(GroupRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

}
