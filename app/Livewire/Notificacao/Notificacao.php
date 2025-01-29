<?php

namespace App\Livewire\Notificacao;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notificacao extends Component
{
    public $notificacoesNaoLidas;

    public function render()
    {
        $usuario = Auth::user();
        $this->notificacoesNaoLidas = $usuario->unreadNotifications;
        return view('livewire.notificacao.notificacao');
    }

}
