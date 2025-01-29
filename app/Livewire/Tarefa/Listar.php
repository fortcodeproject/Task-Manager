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
        return Tarefa::where("id", $idTarefa)
        ->where(function ($query) {
            $query->where("tarefas.usuario_especifico", $this->usuarioLogado->id)
                ->orWhereNull("tarefas.usuario_especifico");
        })
        ->orWhere(function ($query) {
            $query->where("tarefas.criador", Auth::user()->id);
        })
        ->first();
    }
}
