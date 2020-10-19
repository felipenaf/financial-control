<?php

namespace App\Services;

use App\Http\Requests\ContaRequest;
use App\Repositories\Contracts\ContaRepositoryInterface;
use App\Services\Contracts\ContaServiceInterface;

class ContaService implements ContaServiceInterface
{
    private $contaRepository;

    public function __construct(ContaRepositoryInterface $contaRepository)
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

    public function save(ContaRequest $request)
    {
        return $this->contaRepository->save($request);
    }

}
