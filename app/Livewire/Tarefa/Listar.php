<?php

namespace App\Livewire\Tarefa;

use App\Models\PermissaoTarefa;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Listar extends Component
{
    public $permissaoTarefas;
    public $usuarioLogado;

    public function render()
    {
        $this->usuarioLogado = Auth::user();
        $this->permissaoTarefas = $this->buscarPermissoesTarefas();
        return view('livewire.tarefa.listar')
            ->layout("components.layouts.app");
    }

    public function buscarPermissoesTarefas()
    {
        return PermissaoTarefa::all();
    }

    public function buscarTodasTarefas($idTarefa)
    {
        if (Auth::user()->id_acesso == 1) {
            return Tarefa::where("id", $idTarefa)->first();
        } else {
            return Tarefa::where("id", $idTarefa)
                ->where(function ($query) {
                    $query->where("usuario_especifico", $this->usuarioLogado->id)
                        ->orWhereNull("usuario_especifico");
                })
                ->first();
        }
    }

    public function realizarTarefa($idTarefa)
    {
        Tarefa::where("id", $idTarefa)->update([
            'realizador' => Auth::user()->id,
            'estado' => "em andamento",
        ]);

        $this->dispatch("alerta", [
            "icon" => "success",
            "mensagem" => "Tarefa Em Andamento",
            "tempo" => 4000,
        ]);
    }
}
