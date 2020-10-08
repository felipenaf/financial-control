<?php

namespace App\Services;

use App\AceitePropostaYes;

class AceitePropostaYesService
{
    private $aceite;

    public function __construct(AceitePropostaYes $aceite)
    {
        $this->aceite = $aceite;
    }

    public function getAll()
    {
        return $this->aceite->getAll();
    }

}
