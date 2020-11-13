<?php

namespace App\Services;

use App\Http\Requests\ProdutoRequest;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Services\Contracts\ProdutoServiceInterface;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

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

    public function store(ProdutoRequest $request)
    {
        $response = $this->repository->store($request);

        return response([
            'code' => Response::HTTP_OK,
            'data' => $response,
        ], Response::HTTP_OK);

    }

    public function update(ProdutoRequest $request, int $id)
    {
        $validator = Validator::make($request->all(), $request->updateRules());

        if ($validator->fails()) {
            return response([
                'code' => Response::HTTP_BAD_REQUEST,
                'data' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);

        }

        try {
            $response = $this->repository->update($request, $id);

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

    public function destroy(int $id)
    {
        try {
            $response = $this->repository->destroy($id);

            $code = $response === false
                ? Response::HTTP_NOT_FOUND
                : Response::HTTP_NO_CONTENT;

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

}
