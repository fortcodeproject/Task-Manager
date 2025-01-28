<?php

namespace App\Livewire\Usuario;

use Livewire\Component;

class Autenticacao extends Component
{
    public function render()
    {
        return view('livewire.usuario.autenticacao')
        ->layout("components.layouts.app");
    }
}
