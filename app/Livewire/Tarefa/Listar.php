<?php

namespace App\Livewire\Tarefa;

use App\Models\Tarefa;
use Livewire\Component;

class Listar extends Component
{
    public $tarefas;

    public function render()
    {
        $this->tarefas = Tarefa::all();
        return view('livewire.tarefa.listar')
        ->layout("components.layouts.app");
    }
}
