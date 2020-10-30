<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Produto extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $table = 'produtos';

    protected $fillable = [
        'id_grupo', 'id_usuario', 'descricao',
        'valor', 'observacao', 'data_consumo'
    ];

    protected $hidden = ['deleted_at'];

    protected $dates = ['data_consumo'];

    protected $casts = [
        'valor' => 'string'
    ];

    /**
     * Accessor / Get
     */
    public function getDescricaoAttribute($value)
    {
        return "Valor obtido pelo Acessor: " . $value;
    }

    /**
     * Mutator / Set
     */
    public function setDescricaoAttribute($value)
    {
        $this->attributes['descricao'] = mb_strtolower($value);
    }

    public function grupo()
    {
        return $this->hasOne('App\Grupo', 'id', 'id_grupo');
    }

}
