<?php

use Illuminate\Http\Request;
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

Route::get('/', function (Request $request) {
    return response(['message' => $request->path(), 'status' => 'Connected']);;
});

Route::apiResources([
    'conta' => 'ContaController',
    'aceitePropostaYes' => 'AceitePropostaYesController'
]);

/**
 * Actions Handled By Resource Controller

 *   Verb       URI                 Action	    Route Name
 *   GET        /conta              index	    conta.index
 *   GET        /conta/create       create	    conta.create
 *   POST       /conta              store	    conta.store
 *   GET        /conta/{id}         show	    conta.show
 *   GET        /conta/{id}/edit    edit	    conta.edit
 *   PUT/PATCH  /conta/{id}         update	    conta.update
 *   DELETE     /conta/{id}         destroy	    conta.destroy
*/
