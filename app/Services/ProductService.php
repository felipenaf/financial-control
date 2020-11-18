<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\Contracts\ProductServiceInterface;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProductService implements ProductServiceInterface
{
    private $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        $user = JWTAuth::parseToken()->authenticate();

        $response = $this->repository->getAll($user->id);

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

    public function store(ProductRequest $request)
    {
        $response = $this->repository->store($request);

        return response([
            'code' => Response::HTTP_OK,
            'data' => $response,
        ], Response::HTTP_OK);

    }

    public function update(ProductRequest $request, int $id)
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
