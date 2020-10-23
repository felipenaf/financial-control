<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * Build success responses
     *
     * @param string|array $data
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        $responseData = ['data' => $data];

        return response($responseData, $code);
    }

    /**
     * Build error responses
     *
     * @param string $message
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code = Response::HTTP_BAD_REQUEST)
    {
        $responseData = ['error' => $message, 'code' => $code];

        return response($responseData, $code);
    }
}
