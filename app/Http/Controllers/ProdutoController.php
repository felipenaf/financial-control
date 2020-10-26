<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ProdutoServiceInterface;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    private $service;

    public function __construct(ProdutoServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function show(int $id)
    {
        return $this->service->getById($id);
    }

    public function store(ProdutoRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(ProdutoRequest $request, int $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->service->destroy($id);
    }

}
