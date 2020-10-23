<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), $request->updateRules());

        if ($validator->fails()) {
            return response([
                'status' => 400,
                'data' => $validator->errors()
            ], 400);

        }

        $produto = $this->service->update($request, $id);

        return response([
            'status' => empty($produto) ? 204 : 200,
            'data' => $produto
        ]);

    }

    public function destroy(int $id)
    {
        $deleted = $this->service->destroy($id);

        if (!$deleted) {
            return response('', 204);
        }

        return response('');
    }

}
