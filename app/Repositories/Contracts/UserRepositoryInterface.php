<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\UserRequest;

interface UserRepositoryInterface
{
    public function store(UserRequest $request);
}
