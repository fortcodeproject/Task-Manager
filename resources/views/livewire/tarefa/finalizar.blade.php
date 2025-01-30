<div class="container ">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tarefas</h3>
                <h6 class="op-7 mb-2">Finalização de tarefas</h6>
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
                                    <th>Acção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarefas as $tarefa)
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
                                            @if ($tarefa->estado == 'em andamento' && $tarefa->situacao == "activa")
                                                <button type="button"
                                                    wire:click.prevent='finalizarTarefa({{ $tarefa->id }})'
                                                    class="btn btn-success btn-primary btn-lg">
                                                    Finalizar
                                                </button>
                                                @else
                                                {{$tarefa->situacao == "activa" ? "Finalizado": "Vazio"}}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
