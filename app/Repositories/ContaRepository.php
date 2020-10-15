<?php

namespace App\Repositories;

use App\Conta;
use App\Repositories\Contracts\ContaRepositoryInterface;

class ContaRepository implements ContaRepositoryInterface
{
    private $conta;

    public function __construct(Conta $conta)
    {
        $this->conta = $conta;
    }

    public function getAll()
    {
        return $this->conta->getAll();
    }

    public function getById(int $id)
    {
        return $this->conta->getById($id);
    }

}
