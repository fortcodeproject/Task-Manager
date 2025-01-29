<?php

namespace App\Livewire\PermissaoTarefa;

use App\Models\PermissaoTarefa;
use App\Models\Tarefa;
use App\Models\User;
use Livewire\Component;

class Criar extends Component
{
    public $usuarios, $tarefas;
    public $idUsuario, $idTarefa, $editar, $eliminar, $leitura;

    protected $rules = [
        "idUsuario" => "required",
        "idTarefa" => "required",
        "editar" => "required",
        "eliminar" => "required",
        "leitura" => "required",
    ];

    protected $messages = [
        "idUsuario.required" => "Campo obrigatório",
        "idTarefa.required" => "Campo obrigatório",
        "editar.required" => "Campo obrigatório",
        "eliminar.required" => "Campo obrigatório",
        "leitura.required" => "Campo obrigatório",
    ];

    public function render()
    {
        $this->usuarios = User::where("id_acesso", "!=", 1)->get();
        $this->tarefas = Tarefa::all(); 
        return view('livewire.permissao-tarefa.criar');
    }

    public function criar(){
        $this->validate();

        PermissaoTarefa::create([
            'id_usuario' => $this->idUsuario,
            'id_tarefa' => $this->idTarefa,
            'editar' => $this->editar,
            'eliminar' => $this->eliminar,
            'leitura' => $this->leitura
        ]);

        $this->dispatch("alerta", [
            "icon" => "success",
            "mensagem" => "Permissão criada com sucesso",
            "tempo" => 4000,
        ]);

        $this->limparCampos();
    }

    public function limparCampos(){
        $this->idUsuario = $this->idTarefa = null;
        $this->editar = $this->eliminar = $this->leitura = null;
    }
}
