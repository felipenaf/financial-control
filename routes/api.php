<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response('vish', 401);
    }

});

Route::apiResource('users', 'UserController');

Route::middleware(['jwt.auth'])->group(function () {
    Route::apiResources([
        'grupos' => 'GrupoController',
        'produtos' => 'ProdutoController',
    ]);

});
