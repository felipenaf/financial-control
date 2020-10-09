<?php

namespace App\Services;

use App\Repositories\ContaRepository;

class ContaService
{
    private $contaRepository;

    public function __construct(ContaRepository $contaRepository)
    {
        $this->contaRepository = $contaRepository;
    }

    public function getAll()
    {
        return $this->contaRepository->getAll();
    }

}
