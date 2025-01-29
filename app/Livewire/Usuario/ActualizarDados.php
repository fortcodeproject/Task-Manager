<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;

class ActualizarDados extends Component
{
    public $idUsuario, $usuario, $nome, $email;

    protected $rules = [
        "nome" => "required",
        "email" => "required|email",
    ];

    protected $messages = [
        "nome.required" => "Campo obrigatório",
        "email.required" => "Campo obrigatório",
        "email.email" => "Apenas válido para email",
    ];

    public function mount($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function render()
    {
        $this->usuario = User::find($this->idUsuario);
        $this->nome = $this->usuario->name;
        $this->email = $this->usuario->email;
        return view('livewire.usuario.actualizar-dados')
            ->layout("components.layouts.app");
    }

    public function actualizar()
    {
        $this->validate();
        User::where("id", $this->idUsuario)->update([
            'name' => $this->nome,
            'email' => $this->email,
        ]);
        $this->dispatch("alerta", [
            "icon" => "success",
            "mensagem" => "Dados actualizados com sucesso",
            "tempo" => 4000,
        ]);
    }
}
