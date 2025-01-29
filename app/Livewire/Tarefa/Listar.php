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
        $this->tarefas = Tarefa::where(function ($query) {
            $query->where("usuario_especifico", $this->usuarioLogado->id)
                  ->orWhereNull("usuario_especifico");
        })->orWhere(function ($query) {
            $query->where("criador", Auth::user()->id);
        })
        ->get();
    
        return view('livewire.tarefa.listar')
        ->layout("components.layouts.app");
    }
}
