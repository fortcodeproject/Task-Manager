<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AlterarSenha extends Component
{
    public $usuario, $senhaAntiga, $senhaNova, $senhaConfirmacao;

    public function render()
    {
        $idUsuario = Auth::user()->id;
        $this->usuario = User::find($idUsuario);
        return view('livewire.usuario.alterar-senha')
            ->layout("components.layouts.app");
    }

    public function alterar(){
        dd("ok");
    }
}
