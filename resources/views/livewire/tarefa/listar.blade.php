<div class="container ">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tarefas</h3>
                <h6 class="op-7 mb-2">Listegem de todas as tarefas</h6>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Todas Tarefas</h4>
                    </div>
                </div>
                <div class="card-body">
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
                                    <th>Criador</th>

                                    @if ($usuarioLogado->id_acesso == 2)
                                        <th>Realizador</th>
                                    @endif

                                    <th style="width: 10%">Acção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissaoTarefas as $permissao)
                                    @php
                                        $tarefa = $this->buscarTodasTarefas($permissao->id_tarefa);
                                    @endphp

                                        @if ($permissao->leitura == 'permitido' && $permissao->id_usuario == $usuarioLogado->id)
                                            <tr>
                                                <td>{{ $tarefa->id }}</td>
                                                <td style="white-space: nowrap">{{ $tarefa->titulo }}</td>
                                                <td>{{ $tarefa->descricao }}</td>
                                                <td>{{ ucwords($tarefa->estado) }}</td>
                                                <td style="white-space: nowrap">
                                                    @if ($tarefa->usuario_especifico != null)
                                                        {{ ucwords($tarefa->buscarUsuarioEspecifico->name) }}
                                                    @else
                                                        Vazio
                                                    @endif
                                                </td>
                                                <td>{{ ucwords($tarefa->situacao) }}</td>
                                                <td style="white-space: nowrap">
                                                    {{ ucwords($tarefa->buscarUsuarioCriador->name) }}
                                                </td>

                                                @if ($usuarioLogado->id_acesso == 2)
                                                    <td>
                                                        @if ($tarefa->realizador != null)
                                                            {{ $tarefa->realizador }}
                                                        @else
                                                            <button type="button"
                                                                class="btn btn-success btn-primary btn-lg">
                                                                Realizar
                                                            </button>
                                                        @endif
                                                    </td>
                                                @endif

                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" data-bs-toggle="tooltip" title=""
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" data-bs-toggle="tooltip" title=""
                                                            class="btn btn-link btn-danger"
                                                            data-original-title="Remove">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
