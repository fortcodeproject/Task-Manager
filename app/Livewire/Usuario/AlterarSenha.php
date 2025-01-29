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

    protected $rules = [
        "senhaActual" => "required|min:6",
        "senhaNova" => "required|min:6",
        "senhaConfirmacao" => "required|min:6",
    ];

    protected $messages = [
        "senhaActual.required" => "Campo obrigatório",
        "senhaActual.min" => "A senha deve conter no mínimo 6 caracteres",
        "senhaNova.required" => "Campo obrigatório",
        "senhaNova.min" => "A senha deve conter no mínimo 6 caracteres",
        "senhaConfirmacao.required" => "Campo obrigatório",
        "senhaConfirmacao.min" => "A senha deve conter no mínimo 6 caracteres",
    ];

    public function render()
    {
        $idUsuario = Auth::user()->id;
        $this->usuario = User::find($idUsuario);
        return view('livewire.usuario.alterar-senha')
            ->layout("components.layouts.app");
    }

    public function verificarSenhaActual()
    {
        if ($this->senhaActual != null && !Hash::check($this->senhaActual, $this->usuario->password)) {
            $this->msgSenhaActual = "Senha actual errada";
        } else {
            $this->msgSenhaActual = null;
        }
    }

    public function verificarSenhaNova()
    {
        if ($this->senhaNova != null && Hash::check($this->senhaNova, $this->usuario->password)) {
            $this->msgSenhaNova = "Senha nova deve ser diferente da actual";
        } else {
            $this->msgSenhaNova = null;
        }
    }

    public function verificarSenhaConfirmacao()
    {
        if ($this->senhaNova == null && $this->senhaConfirmacao != null) {
            $this->msgSenhaConfirmacao = "Senha não deve estar vazio";
        } else if ($this->senhaNova != $this->senhaConfirmacao) {
            $this->msgSenhaConfirmacao = "Senha nova e de confirmação devem ser iguais";
        } else {
            $this->msgSenhaConfirmacao = null;
        }
    }

    public function alterar()
    {
        if ($this->msgSenhaActual == null && $this->msgSenhaNova == null && $this->msgSenhaConfirmacao == null) {
            $this->validate();
            User::where("id", $this->usuario->id)->update([
                'password' => Hash::make($this->senhaNova),
            ]);
            $this->dispatch("alerta", [
                "icon" => "success",
                "mensagem" => "Senha alterada com sucesso",
                "tempo" => 4000,
            ]);
            $this->limparCampos();
        }
    }

    public function limparCampos()
    {
        $this->senhaActual = $this->senhaNova = $this->senhaConfirmacao = null;
    }
}
