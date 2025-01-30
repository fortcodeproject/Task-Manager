<div>
    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="true">
        <i class="fa fa-bell" style="font-size: 25px"></i>
        <span class="notification bg-primary" style="font-size: 15px">{{ count($notificacoesNaoLidas) }}</span>
    </a>
    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
        <li>
            <div class="dropdown-title">
                Você tem {{ count($notificacoesNaoLidas) }} novas notificações
            </div>
        </li>
        <li>
            <div class="notif-scroll scrollbar-outer">
                <div class="notif-center">
                    @forelse ($notificacoesNaoLidas as $notificacao)
                        <a href="#">
                            <div class="notif-icon">
                            </div>
                            <div class="notif-content">
                                <span class="block alert alert-info">
                                    <div class="text-end">
                                        <button type="button"
                                            wire:click.prevent='marcarComoLida({{$notificacao->notifiable_id}})'
                                            class="bg-none" onclick="event.stopPropagation()">X</button>
                                    </div>
                                    <b>{{ $notificacao->data['descricao'] }}</b> <br>
                                    <span class="time">{{$this->formatarTempo($notificacao->created_at)}}</span>
                                </span>
                            </div>
                        </a>
                    @empty
                        <p class="alert alert-info">Nenhuma notificação encontrada</p>
                    @endforelse
                </div>
            </div>
        </li>
        <li>
            <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
</div>
