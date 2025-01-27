<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = ['id', 'nome', 'estado_id'];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}