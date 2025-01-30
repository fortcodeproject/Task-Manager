<?php

namespace App\Livewire\Notificacao;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notificacao extends Component
{
    public $notificacoesNaoLidas, $notificacoes;

    public function render()
    {
        $usuario = Auth::user();
        $this->notificacoesNaoLidas = $usuario->unreadNotifications;
        $this->notificacoes = $usuario->notifications;
        return view('livewire.notificacao.notificacao');
    }

}
