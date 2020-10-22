<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Produto;
use App\Services\Contracts\ProdutoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function store(ProdutoRequest $request)
    {
        $validator = Validator::make($request->all(), $request->storeRules());

        if ($validator->fails()) {
            return response([
                'status' => 400,
                'data' => $validator->errors()
            ], 400);
        }

        return response([
            'status' => 200,
            'data' => $this->service->store($request)
        ]);

    }

    public function show(int $id)
    {
        $produto = $this->service->getById($id);

        if (empty($produto)) {
            return response('', 204);
        }

        return response([
            'status' => 200,
            'data' => $produto
        ]);

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
