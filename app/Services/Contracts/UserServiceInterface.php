<?php

namespace App\Services\Contracts;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Response;

interface UserServiceInterface
{
    public function login(UserRequest $request);

    public function store(UserRequest $request);
}
