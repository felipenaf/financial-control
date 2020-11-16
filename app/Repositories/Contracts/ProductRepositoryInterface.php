<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\ProductRequest;

interface ProductRepositoryInterface
{
    public function getAll();

    public function getById(int $id);

    public function store(ProductRequest $produto);

    public function update(ProductRequest $request, int $id);

    public function destroy(int $id);

}
