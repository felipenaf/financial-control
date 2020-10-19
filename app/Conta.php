<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = 'tb_conta';

    protected $fillable = [
        'tipo', 'titulo', 'valor', 'forma_pagamento',
        'mais_informacoes', 'id_usuario', 'id_certificacao'
    ];

    const CREATED_AT = 'data_registro';
    const UPDATED_AT = null;

}
