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
                                @foreach ($tarefas as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td style="white-space: nowrap">{{ $item->titulo }}</td>
                                        <td>{{ $item->descricao }}</td>
                                        <td>{{ ucwords($item->estado) }}</td>
                                        <td style="white-space: nowrap">
                                            @if ($item->usuario_especifico != null)
                                                {{ ucwords($item->buscarUsuarioEspecifico->name) }}
                                            @else
                                                Vazio
                                            @endif
                                        </td>
                                        <td>{{ ucwords($item->situacao) }}</td>
                                        <td style="white-space: nowrap">{{ ucwords($item->buscarUsuarioCriador->name) }}
                                        </td>

                                        @if ($usuarioLogado->id_acesso == 2)
                                            <td>
                                                @if ($item->realizador != null)
                                                    {{ $item->realizador }}
                                                @else
                                                    <button type="button" class="btn btn-success btn-primary btn-lg">
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
                                                    class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
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
