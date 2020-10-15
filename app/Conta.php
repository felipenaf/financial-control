<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = 'tb_conta';

    public function getAll()
    {
        return Conta::all()->take(10);
    }

    public function getById(int $id)
    {
        return Conta::find($id);
    }

}
