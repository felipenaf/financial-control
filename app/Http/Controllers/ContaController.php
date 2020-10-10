<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContaService;

class ContaController extends Controller
{
    protected $contaService;
    protected $aceitePropostaYesService;

    public function __construct(ContaService $contaService)
    {
        $this->contaService = $contaService;
    }

    public function index()
    {
        $contas = $this->contaService->getAll();

        if (empty($contas)) {
            return response('', 204);
        }

        return response($contas, 200);
    }

    public function show(Request $request, int $id)
    {
        $resource = $this->contaService->get($id);

        if (empty($resource)) {
            return response('', 204);
        }

        return response($request->fullUrl(), 250);
    }
}
