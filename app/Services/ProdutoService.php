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
        $response = $this->repository->getAll();

        if (empty($response)) {
            return response([
                'code' => Response::HTTP_NOT_FOUND,
                'error' => Response::$statusTexts[Response::HTTP_NOT_FOUND],
            ], Response::HTTP_NOT_FOUND);

        }

        return response(['code' => Response::HTTP_OK, 'data' => $response]);
    }

    public function getById(int $id)
    {
        $response = $this->repository->getById($id);

        if (empty($response)) {
            return response([
                'code' => Response::HTTP_NOT_FOUND,
                'error' => Response::$statusTexts[Response::HTTP_NOT_FOUND],
            ], Response::HTTP_NOT_FOUND);

        }

        return response(['code' => Response::HTTP_OK, 'data' => $response]);
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
        $response = $this->repository->update($request, $id);

        if ($response == null) {
            return response([
                'code' => Response::HTTP_NOT_FOUND,
                'error' => Response::$statusTexts[Response::HTTP_NOT_FOUND],
            ], Response::HTTP_NOT_FOUND);

        }

        return response(['code' => Response::HTTP_OK, 'data' => $response]);
    }

    public function destroy(int $id)
    {
        $response = $this->repository->destroy($id);

        if ($response == null) {
            return response([
                'code' => Response::HTTP_NOT_FOUND,
                'error' => Response::$statusTexts[Response::HTTP_NOT_FOUND],
            ], Response::HTTP_NOT_FOUND);

        }

        return response('', Response::HTTP_NO_CONTENT);
    }

}
