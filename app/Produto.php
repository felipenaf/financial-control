<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'id_grupo', 'id_usuario', 'descricao',
        'valor', 'observacao', 'data_criacao'
    ];

    const CREATED_AT = null;
    const UPDATED_AT = 'data_modificacao';

}
