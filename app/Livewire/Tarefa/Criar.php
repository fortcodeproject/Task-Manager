<?php

namespace App\Livewire\Tarefa;

use App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Criar extends Component
{
    public $titulo, $usuarioEspecifico, $descricao;

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
        return view('livewire.tarefa.criar');
    }

    public function criar(){
        $this->validate();
        
        Tarefa::create([
            'titulo' => $this->titulo,
            'descricao'=> $this->descricao,
            'usuario_especifico' => $this->usuarioEspecifico ? $this->usuarioEspecifico : null,
            'criador' => Auth::user()->id,
            'realizador' => null
        ]);

        $this->dispatch("alerta", [
            "icon" => "success",
            "mensagem" => "Tarefa criada com sucesso",
            "tempo" => 4000,
        ]);

        $this->limparCampos();
    }

    public function limparCampos(){
        $this->titulo = $this->usuarioEspecifico = $this->descricao = null;
    }
}
