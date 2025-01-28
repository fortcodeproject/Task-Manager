<?php

namespace App\Livewire\Usuario;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Autenticacao extends Component
{
    public $email, $senha;

    protected $rules = [
        "email" => "required|email",
        "senha" => "required|min:3",
    ];

    protected $messages = [
        "email.required" => "Campo obrigatório",
        "email.email" => "Apenas válido para email",
        "senha.required" => "Campo obrigatório",
        "senha.min" => "A senha deve conter no mínimo 3 caracteres",
    ];

    public function render()
    {
        return view('livewire.usuario.autenticacao')
        ->layout("components.layouts.app_auth");
    }

    public function autenticar(){
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->senha])) {
            dd("Usuario encontrado");
            Auth::logout();
        }else{
            dd("Usuario não encontrado");
            /*$this->emit("alerta", [
                "icon" => "error",
                "mensagem" => "Usuario não encontrado",
            ]);*/
        }
    }
}
