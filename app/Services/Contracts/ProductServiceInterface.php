<?php

namespace App\Services\Contracts;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Response;

interface ProductServiceInterface
{
    public function getAll(): Response;

    public function getById(int $id): Response;

    public function store(ProductRequest $produto): Response;

    public function update(ProductRequest $request, int $id): Response;

    public function destroy(int $id): Response;

}
