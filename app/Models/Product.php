<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use SoftDeletes;
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'group_id', 'user_id', 'description',
        'amount', 'detail', 'consumption_at'
    ];

    protected $hidden = ['deleted_at'];

    protected $dates = ['consumption_at'];

    protected $casts = [
        'value' => 'string'
    ];

    /**
     * Accessor / Get
     */
    public function getDescriptionAttribute($value)
    {
        return "Valor obtido pelo Acessor: " . $value;
    }

    /**
     * Mutator / Set
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = mb_strtolower($value);
    }

    public function group()
    {
        return $this->hasOne('App\Models\Group', 'id', 'group_id');
    }

    private function teste(int $num = 0, string $text = 'teste')
    {
        return "Foram executados " . $num . ' ' . $text . "(s)";
    }

}
