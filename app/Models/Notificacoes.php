<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacoes extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'criador'
    ];
}
