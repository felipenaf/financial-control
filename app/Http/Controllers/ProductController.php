<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ProductServiceInterface;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductServiceInterface $service)
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

    public function store(ProductRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return response([
                'code' => Response::HTTP_BAD_REQUEST,
                'data' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);

        }

        return $this->service->store($request);
    }

    public function update(ProductRequest $request, int $id)
    {
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return response([
                'code' => Response::HTTP_BAD_REQUEST,
                'data' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);

        }

        return $this->service->update($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->service->destroy($id);
    }

}
