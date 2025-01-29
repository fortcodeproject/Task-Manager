<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AlterarSenha extends Component
{
    public $usuario, $senhaActual, $senhaNova, $senhaConfirmacao;
    public $msgSenhaActual, $msgSenhaNova, $msgSenhaConfirmacao;

    public function render()
    {
        $idUsuario = Auth::user()->id;
        $this->usuario = User::find($idUsuario);
        return view('livewire.usuario.alterar-senha')
            ->layout("components.layouts.app");
    }

    public function verificarSenhaActual(){
        if($this->senhaActual != null && !Hash::check($this->senhaActual, $this->usuario->password)){
            $this->msgSenhaActual = "Senha actual errada";
        }else{
            $this->msgSenhaActual = null;
        }
    }

    public function verificarSenhaNova(){
        dd("ok");
    }

    public function verificarSenhaConfirmacao(){
        dd("ok");
    }

    public function alterar(){
        dd("ok");
    }
}
