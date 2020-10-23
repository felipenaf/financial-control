<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $table = 'produtos';

    protected $fillable = [
        'id_grupo', 'id_usuario', 'descricao',
        'valor', 'observacao', 'data_criacao'
    ];

    protected $hidden = ['deleted_at'];

    const CREATED_AT = null;
    const UPDATED_AT = 'data_modificacao';

    public function grupo()
    {
        return $this->hasOne('App\Grupo', 'id', 'id_grupo');
    }

}
