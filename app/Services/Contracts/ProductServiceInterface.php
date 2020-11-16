<?php

namespace App\Services\Contracts;

use App\Http\Requests\ProductRequest;

interface ProductServiceInterface
{
    public function getAll();

    public function getById(int $id);

    public function store(ProductRequest $produto);

    public function update(ProductRequest $request, int $id);

    public function destroy(int $id);

}
