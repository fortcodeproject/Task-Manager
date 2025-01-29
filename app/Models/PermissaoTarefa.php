<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissaoTarefa extends Model
{
    protected $fillable = [
        'id_usuario',
        'id_tarefa',
        'editar',
        'eliminar',
        'leitura'
    ];
}
