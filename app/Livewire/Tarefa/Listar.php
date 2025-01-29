<?php

namespace App\Livewire\Tarefa;

use App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Listar extends Component
{
    public $tarefas;
    public $usuarioLogado;

    public function render()
    {
        $this->usuarioLogado = Auth::user();
        $this->tarefas = Tarefa::all();
        return view('livewire.tarefa.listar')
        ->layout("components.layouts.app");
    }
}
