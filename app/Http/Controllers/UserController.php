<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $service;

    public function __construct(UserServiceInterface $service)
    {
        $this->service = $service;
    }

    public function login(UserRequest $request)
    {
        $validator = Validator::make(
            $request->only('email', 'password'),
            $request->loginRules()
        );

        if ($validator->fails()) {
            return response([
                'code' => Response::HTTP_BAD_REQUEST,
                'data' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);

        }

        return $this->service->login($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        return $this->service->store($request);
    }

}
