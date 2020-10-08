<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContaService;
use App\Services\AceitePropostaYesService;

class ContaController extends Controller
{
    protected $contaService;
    protected $aceitePropostaYesService;

    public function __construct(ContaService $contaService, AceitePropostaYesService $aceitePropostaYesService)
    {
        $this->contaService = $contaService;
        $this->aceitePropostaYesService = $aceitePropostaYesService;
    }

    public function getAll()
    {
        $contas = $this->contaService->getAll();
        $aceites = $this->aceitePropostaYesService->getAll();

        foreach ($contas as $conta) {
            echo $conta->valor . "<br />";
        }

        foreach ($aceites as $aceite) {
            echo $aceite->id_certificacao . "<br />";
        }

        return view('welcome');
    }
}
