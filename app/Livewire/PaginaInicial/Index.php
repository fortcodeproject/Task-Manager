<?php

namespace App\Livewire\PaginaInicial;

use App\Models\Tarefa;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $usuarios, $tarefas, $trPendentes, $trAndamento, $trFinalizadas;

    public function render()
    {
        $this->verificarValidadeTarefas();
        $this->usuarios = User::where("id_acesso", "!=", 1)->get();
        $this->tarefas = Tarefa::where("estado", "finalizado")->get();
        $this->trPendentes = Tarefa::where("estado", "pendente")->get();
        $this->trFinalizadas = Tarefa::where("estado", "finalizado")->get();
        
        return view('livewire.pagina-inicial.index')
        ->layout("components.layouts.app");
    }

    public function buscarUsuario($idUsuario){
        return User::find($idUsuario);
    }

    public function verificarValidadeTarefas(){
        $todasTarefas = Tarefa::all();
        foreach ($todasTarefas as $value) {
            $tarefa = Tarefa::find($value["id"]);
            $tempoValidade = Carbon::now()->diffInHours($tarefa->created_at);
            if (abs($tempoValidade) >= 24) {
                $tarefa->update([
                    'situacao' => 'inactiva',
                ]);
            }
        }
    }
}
