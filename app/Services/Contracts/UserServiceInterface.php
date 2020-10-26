<?php

namespace App\Services\Contracts;

use App\Http\Requests\UserRequest;

interface UserServiceInterface
{
    public function store(UserRequest $request);
}
