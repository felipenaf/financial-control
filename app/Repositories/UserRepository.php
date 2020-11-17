<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function store(UserRequest $request)
    {
        $this->model->password = $request->get('password');
        $this->model->email = $request->get('email');
        $this->model->name = $request->get('name');
        $this->model->save();

        return $this->model->find($this->model->id);
    }

}
