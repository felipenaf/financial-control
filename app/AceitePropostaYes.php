<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AceitePropostaYes extends Model
{
    protected $table = 'tb_aceite_proposta_yes';

    public function getAll()
    {
        return AceitePropostaYes::all();
    }
}
