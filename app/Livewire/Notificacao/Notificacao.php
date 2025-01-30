<?php

namespace App\Livewire\Notificacao;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Notificacao extends Component
{
    public $notificacoesNaoLidas, $usuario;
    public $listeners = ['tempoRealNotificacoes'];

    public function render()
    {
        $this->usuario = Auth::user();
        $this->notificacoesNaoLidas = $this->usuario->unreadNotifications;
        return view('livewire.notificacao.notificacao');
    }

    public function marcarComoLido($idNotificacao){
        DB::update('update notifications set read_at = ? where id = ?', [now(), $idNotificacao]);
        $this->dispatch("alerta", [
            "icon" => "warning",
            "mensagem" => "Notificação marcada como lida"
        ]);
    }

    public function marcarComoTodosLido(){
        $todasNotificacoes = $this->usuario->unreadNotifications;
        $todasNotificacoes->markAsRead();
        $this->dispatch("alerta", [
            "icon" => "warning",
            "mensagem" => "Todas notificações marcadas como lidas"
        ]);
    }

    public function formatarTempo($created_at){
        $tempo = Carbon::now()->diffInHours($created_at);
        if (abs($tempo) >= 24) {
            return $created_at;
        }else if (abs($tempo) <= 24 && abs($tempo) >= 1) {
            return intval(abs($tempo)) . " hora/as atrás";
        }else{
            $minutos = Carbon::now()->diffInMinute($created_at);
            return intval(abs($minutos)) . " minuto/os atrás";
        }
    }

}
