<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Services\Contracts\ContaServiceInterface;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Http\Request;

class ContaController extends Controller
{
    protected $service;

    public function __construct(ContaServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $resource = $this->service->getAll();

        if (empty($resource)) {
            return response('', 204);
        }

        return response($resource, 200);
    }

    public function show(int $id)
    {
        $resource = $this->service->getById($id);

        if (empty($resource)) {
            return response('', 204);
        }

        return response($resource, 200);
    }

    public function store(ContaRequest $request)
    {
        $validator = Validator::make($request->all(), $request->attributes());

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        return response([
            'status' => 200,
            'data' => $this->service->save($request)
        ]);

    }

}
