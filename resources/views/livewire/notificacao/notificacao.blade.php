<div>
    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
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
                    @foreach ($notificacoesNaoLidas as $notificacao)
                        <a href="#">
                            <div class="notif-icon notif-primary">
                                <i class="fa fa-envelop"></i>
                            </div>
                            <div class="notif-content">
                                <span class="block alert alert-info">
                                    <b>{{ $notificacao->data["descricao"] }}</b> <br>
                                    <span class="time">5 minutes ago</span>
                                </span>
                                
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </li>
        <li>
            <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
</div>
