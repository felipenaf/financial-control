<?php

namespace App\Repositories;

use App\Models\Group;
use App\Repositories\Contracts\GroupRepositoryInterface;

class GroupRepository implements GroupRepositoryInterface
{
    private $model;

    public function __construct(Group $model)
    {
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

}
