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
}
