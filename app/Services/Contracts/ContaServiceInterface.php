<?php

namespace App\Services\Contracts;

interface ContaServiceInterface
{
    public function getAll();

    public function getById(int $id);
}
