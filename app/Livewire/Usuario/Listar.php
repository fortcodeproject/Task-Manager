<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;

class Listar extends Component
{
    public $usuarios;

    public function render()
    {
        $this->usuarios = User::where("id_acesso", "!=", 1)->get();
        return view('livewire.usuario.listar')
        ->layout("components.layouts.app");
    }

    public function eliminarUsuario($idUsuario){
        $usuario = User::find($idUsuario);
        $usuario->delete();
        $this->dispatch("alerta", [
            "icon" => "success",
            "mensagem" => "Usuário Eliminada com sucesso",
            "tempo" => 4000,
        ]);
    }
}
