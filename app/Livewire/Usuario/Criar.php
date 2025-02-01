<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Criar extends Component
{
    public $usuarios;
    public $nome, $email, $criacao_tarefa;

    protected $rules = [
        "nome" => "required",
        "email" => "required",
        "criacao_tarefa" => "required",
    ];

    protected $messages = [
        "nome.required" => "Campo obrigatório",
        "email.required" => "Campo obrigatório",
        "criacao_tarefa.required" => "Campo obrigatório",
    ];

    public function mount(){
        Gate::authorize("superAdmin");
    }

    public function render()
    {
        $this->usuarios = User::all();
        return view('livewire.usuario.criar')
        ->layout("components.layouts.app");
    }

    public function criar(){
        $this->validate();

        User::create([
            'name' => $this->nome,
            'email' => $this->email,
            'password' => Hash::make("123456"),
            'id_acesso' => 2,
            'criacao_tarefa' => $this->criacao_tarefa
        ]);

        $this->dispatch("alerta", [
            "icon" => "success",
            "mensagem" => "Usuário criado com sucesso",
            "tempo" => 4000,
        ]);

        $this->limparCampos();
    }

    public function limparCampos(){
        $this->nome = $this->email = $this->criacao_tarefa = null;
    }
}
