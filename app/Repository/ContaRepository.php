<?php

namespace App\Repository;

use App\Conta;

class ContaRepository
{
    private $conta;

    public function __construct (Conta $conta)
    {
        $this->conta = $conta;
    }

    public function getAll ()
    {
        return $this->conta->getAll();
    }

}
