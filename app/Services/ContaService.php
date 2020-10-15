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
        $resources = $this->contaRepository->getAll();

        $contas = [];
        foreach ($resources as $conta) {
            array_push($contas, $conta->valor);
        }

        return $contas;
    }

    public function getById(int $id)
    {
        return $this->contaRepository->getById($id);
    }

}
