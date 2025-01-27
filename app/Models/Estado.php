<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['id', 'sigla', 'nome'];

    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }
}