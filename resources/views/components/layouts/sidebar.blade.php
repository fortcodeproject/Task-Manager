<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    @php
        use Illuminate\Support\Facades\Auth;
        $usuario = Auth::user();
    @endphp

    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{route("inicio")}}" class="logo text-light" >
                <h3><i class="fas fa-edit"></i> Task Manager</h3>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a data-bs-toggle="collapse" href="#Painel" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Painel</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Painel">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('usuario.perfil', $usuario->id) }}">
                                    <span class="sub-item">Perfil</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tarerfas">
                        <i class="fas fa-edit"></i>
                        <p>Tarefas</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tarerfas">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('tarefa.criar')}}">
                                    <span class="sub-item">Criar</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('tarefa.listar')}}">
                                    <span class="sub-item">Listar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#usuarios">
                        <i class="fas fa-users"></i>
                        <p>Usuários</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="usuarios">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="">
                                    <span class="sub-item">Criar</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="sub-item">Listar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->