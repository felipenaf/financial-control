<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Notifications\NewUserNotification;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService implements UserServiceInterface
{
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function login(UserRequest $request)
    {
        $token = JWTAuth::attempt($request->only('email', 'password'));

        if ($token === false) {
            return response([
                'status' => Response::HTTP_UNAUTHORIZED,
                'error' => 'Não Autorizado'
            ], Response::HTTP_UNAUTHORIZED);

        }

        return response([
            'status' => Response::HTTP_OK,
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
            ]

        ]);

    }

    public function store(UserRequest $request)
    {
        $validator = Validator::make($request->all(), $request->storeRules());

        if ($validator->fails()) {
            return response([
                'code' => Response::HTTP_BAD_REQUEST,
                'data' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);

        }

        try {
            $response = $this->repository->store($request);

            event(new NewUserNotification($response));

            return response([
                'code' => Response::HTTP_OK,
                'data' => $response,
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'error' => explode("\n", $e->getMessage())
            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }

}
