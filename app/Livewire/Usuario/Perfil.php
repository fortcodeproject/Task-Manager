<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;

class Perfil extends Component
{
    public $idUsuario, $usuario;

    public function mount($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function render()
    {
        $this->usuario = User::find($this->idUsuario);
        return view('livewire.usuario.perfil')
        ->layout("components.layouts.app");
    }
}
