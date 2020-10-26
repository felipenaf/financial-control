<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/login', 'UserController@login');

Route::post('login', function (Request $request) {
    $token = JWTAuth::attempt($request->only('email', 'password'));

    if ($token === false) {
        return response([
            'status' => Response::HTTP_NOT_FOUND,
            'error' => 'NOT FOUND.'
        ], Response::HTTP_NOT_FOUND);
    }

    return response([
        'status' => Response::HTTP_OK,
        'data' => [
            'token' => $token,
        ]
    ]);

});

Route::apiResource('users', 'UserController');

Route::middleware(['jwt.auth'])->group(function () {
    Route::apiResources([
        'grupos' => 'GrupoController',
        'produtos' => 'ProdutoController',
    ]);

});
