<?php

namespace App\Livewire\Tarefa;

use App\Models\Tarefa;
use App\Models\User;
use Livewire\Component;

class Actualizar extends Component
{
    public $titulo, $usuarioEspecifico, $descricao;
    public $usuarios;
    public $tarefas, $trPendentes, $trAndamento, $trFinalizadas;

    protected $rules = [
        "titulo" => "required",
        "descricao" => "required",
    ];

    protected $messages = [
        "titulo.required" => "Campo obrigatório",
        "descricao.required" => "Campo obrigatório",
    ];

    public function render()
    {
        $this->usuarios = User::where("id_acesso", "!=", 1)->get();
        $this->tarefas = Tarefa::all();
        $this->trPendentes = Tarefa::where("estado", "pendente")->get();
        $this->trAndamento = Tarefa::where("estado", "em andamento")->get();
        $this->trFinalizadas = Tarefa::where("estado", "finalizado")->get();
        
        return view('livewire.tarefa.actualizar')
        ->layout("components.layouts.app");
    }

    public function criar()
    {
        $this->validate();

        $tarefa = Tarefa::create([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'usuario_especifico' => $this->usuarioEspecifico ? $this->usuarioEspecifico : null,
            'criador' => Auth::user()->id,
            'realizador' => null,
        ]);
        $this->criarPermissao($tarefa->id);

        $this->dispatch("alerta", [
            "icon" => "success",
            "mensagem" => "Tarefa criada com sucesso",
            "tempo" => 4000,
        ]);

        $this->limparCampos();
    }

    public function limparCampos()
    {
        $this->titulo = $this->usuarioEspecifico = $this->descricao = null;
    }
}
