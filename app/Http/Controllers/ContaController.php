<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use App\AceitePropostaYes;

class ContaController extends Controller
{
    protected $conta;
    protected $aceitePropostaYes;

    public function __construct(Conta $conta, AceitePropostaYes $aceitePropostaYes)
    {
        $this->conta = $conta;
        $this->aceitePropostaYes = $aceitePropostaYes;
    }

    public function getAll()
    {
        $contas = $this->conta->getAll();
        $aceites = $this->aceitePropostaYes->getAll();

        foreach ($contas as $conta) {
            echo $conta->valor . "<br />";
        }

        foreach ($aceites as $aceite) {
            echo $aceite->id_certificacao . "<br />";
        }

        return view('welcome');
    }
}
