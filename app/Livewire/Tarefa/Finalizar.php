<?php

namespace App\Livewire\Tarefa;

use App\Models\PermissaoTarefa;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Finalizar extends Component
{
    public $permissaoTarefas, $tarefas;
    public $usuarioLogado;
    public $permicaoUsuarioLogado = array();

    public function render()
    {
        $this->usuarioLogado = Auth::user();
        $this->tarefas = $this->buscarTarefas();
        $this->permissaoTarefas = $this->buscarPermissoesTarefas();
        return view('livewire.tarefa.finalizar');
    }

    public function buscarPermissoesTarefas()
    {
        return PermissaoTarefa::all();
    }

    public function buscarTarefas()
    {
        return Tarefa::where("realizador", $this->usuarioLogado->id)
            ->where(function ($query) {
                $query->where("estado", "em andamento")
                    ->orWhere("estado", "finalizado");
            })
            ->get();
    }

    public function finalizarTarefa($idTarefa)
    {
        Tarefa::where("id", $idTarefa)->update([
            'realizador' => Auth::user()->id,
            'estado' => "finalizado",
        ]);

        $this->dispatch("alerta", [
            "icon" => "success",
            "mensagem" => "Tarefa Finalizada",
            "tempo" => 4000,
        ]);
    }
}
