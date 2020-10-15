<?php

namespace App\Repositories;

use App\Conta;

class ContaRepository
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
        return $this->conta->get($id);
    }

}
