<?php

namespace App\Repositories\Contracts;

interface ContaRepositoryInterface
{
    public function getAll();

    public function getById(int $id);
}
