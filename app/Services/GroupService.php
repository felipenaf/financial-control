<?php

namespace App\Services;

use App\Repositories\Contracts\GroupRepositoryInterface;
use App\Services\Contracts\GroupServiceInterface;
use Illuminate\Http\Response;

class GroupService implements GroupServiceInterface
{
    private $repository;

    public function __construct(GroupRepositoryInterface $repository)
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

}
