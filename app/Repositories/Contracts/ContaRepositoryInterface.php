<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\ContaRequest;

interface ContaRepositoryInterface
{
    public function getAll();

    public function getById(int $id);

    public function save(ContaRequest $request);
}
