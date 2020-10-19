<?php

namespace App\Services\Contracts;

use App\Http\Requests\ContaRequest;

interface ContaServiceInterface
{
    public function getAll();

    public function getById(int $id);

    public function save(ContaRequest $request);

}
