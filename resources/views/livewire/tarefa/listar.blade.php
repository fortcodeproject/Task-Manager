<div class="container ">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tarefas</h3>
                <h6 class="op-7 mb-2">Listagem de todas as tarefas</h6>
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
                                    <th>Realizador</th>
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
                                            <td style="white-space: nowrap">{{ ucwords($tarefa->estado) }}</td>
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
                                            <td>
                                                @if ($tarefa->realizador != null)
                                                    {{ ucwords($tarefa->buscarUsuarioRealizador->name) }}
                                                @else
                                                    @if ($usuarioLogado->id_acesso == 2 && $tarefa->situacao == "activa")
                                                        <button type="button"
                                                            wire:click.prevent='realizarTarefa({{ $tarefa->id }})'
                                                            class="btn btn-success btn-primary btn-lg">
                                                            Realizar
                                                        </button>
                                                    @else
                                                        Vazio
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    @if ($permissao->editar == 'permitido')
                                                        <a href="{{route("tarefa.actualizar", $tarefa->id)}}">
                                                            <button type="button" data-bs-toggle="tooltip"
                                                                title="" class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="Edit Task">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </a>
                                                    @endif

                                                    @if ($permissao->eliminar == 'permitido')
                                                        <button type="button" data-bs-toggle="tooltip" title=""
                                                            class="btn btn-link btn-danger"
                                                            wire:click.prevent='eliminarTarefa({{$tarefa->id}})'
                                                            data-original-title="Remove">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    @endif
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
