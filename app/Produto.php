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
        'valor', 'observacao', 'data_consumo'
    ];

    protected $hidden = ['deleted_at'];

    public function grupo()
    {
        return $this->hasOne('App\Grupo', 'id', 'id_grupo');
    }

}
