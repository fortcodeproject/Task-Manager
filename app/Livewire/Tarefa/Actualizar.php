<?php

namespace App\Livewire\Tarefa;

use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Actualizar extends Component
{
    public $idTarefa, $titulo, $usuarioEspecifico, $descricao;
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

    public function mount($idTarefa){
        $this->idTarefa = $idTarefa;
        $this->preencherFormulario($idTarefa);
    }

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

    public function actualizarTarefa()
    {
        $this->validate();

        $tarefa = Tarefa::where("id", $this->idTarefa)->update([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'usuario_especifico' => $this->usuarioEspecifico ? $this->usuarioEspecifico : null,
            'criador' => Auth::user()->id,
            'realizador' => null,
        ]);

        $this->dispatch("alerta", [
            "icon" => "success",
            "mensagem" => "Tarefa actualizada com sucesso",
            "tempo" => 4000,
        ]);

        return redirect()->route("tarefa.listar");
    }

    public function preencherFormulario($idTarefa){
        $tarefa = Tarefa::find($idTarefa);
        $this->titulo = $tarefa->titulo;
        $this->descricao = $tarefa->descricao;
        $this->usuarioEspecifico =  $tarefa->usuarioEspecifico;
    }
}
