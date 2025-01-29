<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'estado',
        'usuario_especifico',
        'situacao',
        'criador',
        'realizador'
    ];

    public function buscarUsuarioCriador(){
        return $this->belongsTo(User::class, "criador", "id");
     }
}
