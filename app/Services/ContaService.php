<?php

namespace App\Services;

use App\Conta;

class ContaService
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

}
