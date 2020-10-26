<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\Contracts\UserServiceInterface;

class UserController extends Controller
{
    private $service;

    public function __construct(UserServiceInterface $service)
    {
        $this->service = $service;
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
