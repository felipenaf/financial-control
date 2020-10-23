<?php

namespace App\Services;

use App\Http\Requests\ProdutoRequest;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Services\Contracts\ProdutoServiceInterface;
use Exception;
use Illuminate\Http\Response;

class ProdutoService implements ProdutoServiceInterface
{
    private $repository;

    public function __construct(ProdutoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        try {
            $response = $this->repository->getAll();

            $code = empty($response)
                ? Response::HTTP_NOT_FOUND
                : Response::HTTP_OK;

            return response([
                'code' => $code,
                'data' => $response,
            ], $code);

        } catch (Exception $e) {
            return response([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'error' => explode("\n", $e->getMessage())
            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }

    public function getById(int $id)
    {
        try {
            $response = $this->repository->getById($id);

            $code = empty($response)
                ? Response::HTTP_NOT_FOUND
                : Response::HTTP_OK;

            return response([
                'code' => $code,
                'data' => $response,
            ], $code);

        } catch (Exception $e) {
            return response([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'error' => explode("\n", $e->getMessage())
            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }

    public function store(ProdutoRequest $produto)
    {
        return $this->repository->store($produto);
    }

    public function update(ProdutoRequest $request, int $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->repository->destroy($id);
    }

}
