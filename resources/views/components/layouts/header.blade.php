<div class="main-header">
    @php
        use Illuminate\Support\Facades\Auth;
        $usuario = Auth::user();
    @endphp

    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
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
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pe-1">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="Search ..." class="form-control" />
                </div>
            </nav>

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                        aria-expanded="false">
                        <div class="">
                            <i class="fas fa-user" style="font-size: 30px"></i>
                        </div>
                        <span class="profile-username">
                            <span class="op-7"></span>
                            <span class="fw-bold">{{ucwords($usuario->name)}}</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="">
                                        <i class="fas fa-user" style="font-size: 50px"></i>
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ucwords($usuario->name)}}</h4>
                                        <p class="text-muted">{{$usuario->email}}</p>
                                        <a href="{{ route('usuario.perfil', $usuario->id) }}" class="btn btn-xs btn-secondary btn-sm">Ver Perfil</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('usuario.actualizar.dados', $usuario->id) }}">Actualizar Dados</a>
                                <a class="dropdown-item" href="{{ route('usuario.alterar.senha') }}">Alterar Senha</a>
                                <a class="dropdown-item" href="{{ route('usuario.sair') }}">Sair</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
