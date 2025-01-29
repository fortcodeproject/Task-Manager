<?php

namespace App\Livewire\PermissaoTarefa;

use App\Models\PermissaoTarefa;
use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Alterar extends Component
{
    public $permissaoTarefas;
    public $usuarioLogado;
    public $idPermissao;
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
        $this->tarefas = Tarefa::all(); 
        $this->usuarios = User::where("id_acesso", "!=", 1)->get();
        $this->usuarioLogado = Auth::user();
        $this->permissaoTarefas = $this->buscarPermissoesTarefas();
        return view('livewire.permissao-tarefa.alterar')
        ->layout("components.layouts.app");
    }

    public function alterarPermissao(){
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

    public function buscarPermissoesTarefas()
    {
        return PermissaoTarefa::where("id_usuario", "!=", Auth::user()->id)->get();
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

    public function preencharFormulario($idPermissao){
        $permissao = PermissaoTarefa::find($idPermissao);
        $this->idPermissao = $permissao->id;
        $this->idUsuario = $permissao->id_usuario;
        $this->idTarefa =  $permissao->id_tarefa;
        $this->editar =  $permissao->editar;
        $this->eliminar =  $permissao->eliminar;
        $this->leitura =  $permissao->leitura;
    }
}
