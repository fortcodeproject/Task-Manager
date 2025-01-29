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

    public function buscarUsuarioEspecifico(){
        return $this->belongsTo(User::class, "usuario_especifico", "id");
     }

    public function buscarUsuarioRealizador(){
        return $this->belongsTo(User::class, "realizador", "id");
     }

    public function buscarPermissao(){
        return $this->belongsTo(PermissaoTarefa::class, "id", "id_tarefa");
    }
}
