<?php

namespace App\Http\Controllers;

use App\Services\ContaService;
use App\Http\Requests\ContaRequest;

class ContaController extends Controller
{
    protected $contaService;

    public function __construct(ContaService $contaService)
    {
        $this->contaService = $contaService;
    }

    public function index()
    {
        $resource = $this->contaService->getAll();

        if (empty($resource)) {
            return response('', 204);
        }

        return response($resource, 200);
    }

    public function show(int $id)
    {
        $resource = $this->contaService->getById($id);

        if (empty($resource)) {
            return response('', 204);
        }

        return response($resource, 200);
    }

    public function store(ContaRequest $request)
    {
        $request->validated();

        $dd = $request->json();
    }

}
