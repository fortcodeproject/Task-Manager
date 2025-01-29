<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;

class PermissaoUsuario extends Component
{
    public $usuarios, $criacao_tarefa;
    public $idUsuario;

    protected $rules = [
        "criacao_tarefa" => "required"
    ];

    protected $messages = [
        "criacao_tarefa.required" => "Campo obrigatório"
    ];

    public function render()
    {
        $this->usuarios = User::where("id_acesso", "!=", 1)->get();
        return view('livewire.usuario.permissao-usuario')
        ->layout("components.layouts.app");
    }

    public function actualizarPermissao()
    {
        $this->validate();
        User::where("id", $this->idUsuario)->update([
            'criacao_tarefa' => $this->criacao_tarefa
        ]);
        $this->dispatch("alerta", [
            "icon" => "success",
            "mensagem" => "Usuário Permitido para criar tarefas",
            "tempo" => 4000,
        ]);
    }

    public function preencherFormulario($idUsuario){
        $usuario = User::find($idUsuario);
        $this->idUsuario = $usuario->id;
        $this->criacao_tarefa = $usuario->criacao_tarefa;
    }
}
