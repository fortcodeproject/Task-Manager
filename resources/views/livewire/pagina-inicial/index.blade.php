<div class="container ">
    @php
        use Illuminate\Support\Facades\Auth;
        $usuario = Auth::user();
    @endphp

    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Página Inicial</h3>
                <h6 class="op-7 mb-2">Seja Bem-vindo</h6>
            </div>
        </div>

        <div class="row">
            @if ($usuario->id_acesso == 1)
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Usuários</p>
                                        <h4 class="card-title">{{ count($usuarios) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-edit"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Tarefas</p>
                                    <h4 class="card-title">{{ count($tarefas) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Tarefas Pendentes</p>
                                    <h4 class="card-title">{{ count($trPendentes) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Tr. Finalizadas</p>
                                    <h4 class="card-title">{{ count($trFinalizadas) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="card-title mb-3">
                Lista de Tarefas Finalizadas
            </div>
            <div class="table-responsive">
                <table id="minhaTabela" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Estado</th>
                            <th>Usuário Específico</th>
                            <th>Situação</th>
                            <th>Realizador</th>
                            <th>Criador</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarefas as $tarefa)
                                <tr>
                                    <td>{{ $tarefa->id }}</td>
                                    <td style="white-space: nowrap">{{ $tarefa->titulo }}</td>
                                    <td>{{ $tarefa->descricao }}</td>
                                    <td style="white-space: nowrap">
                                        <button class="btn btn-icon btn-round btn-success btn-sm me-2">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        {{ ucwords($tarefa->estado) }}
                                    </td>
                                    <td style="white-space: nowrap">
                                        @if ($tarefa->usuario_especifico != null)
                                            {{ ucwords($tarefa->buscarUsuarioEspecifico->name) }}
                                        @else
                                            Vazio
                                        @endif
                                    </td>
                                    <td>{{ ucwords($tarefa->situacao) }}</td>
                                    <td style="white-space: nowrap">
                                        {{ $tarefa->buscarUsuarioRealizador ?  ucwords($tarefa->buscarUsuarioRealizador->name) : "Vazio"}}
                                    </td>
                                    <td style="white-space: nowrap">
                                        {{ ucwords($tarefa->buscarUsuarioCriador->name) }}
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
