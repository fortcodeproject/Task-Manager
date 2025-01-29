<div class="container ">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Alteraração de Permissões</h3>
                <h6 class="op-7 mb-2">Alterar Permissões de Tarefas</h6>
            </div>
        </div>

        <h3 class="fw-bold mb-3">Alterar Permissão</h3>
        <form class="row mb-3" wire:submit.prevent="alterarPermissao">
            <div class="col-6 mb-3">
                <p class="card-category">Usuário:</p>
                <select class="form-select" wire:model='idUsuario'>
                    <option class="d-none">Selecione...</option>
                    @foreach ($usuarios as $item)
                        <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                    @endforeach
                </select>
                <div class="text-danger">
                    @error('idUsuario')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-6 mb-3">
                <p class="card-category">Tarefas:</p>
                <select class="form-select" wire:model='idTarefa'>
                    <option class="d-none">Selecione...</option>
                    @foreach ($tarefas as $item)
                        <option value="{{ $item->id }}">{{ ucwords($item->titulo) }}</option>
                    @endforeach
                </select>
                <div class="text-danger">
                    @error('idTarefa')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-6 mb-3">
                <p class="card-category">Editar:</p>
                <select class="form-select" wire:model='editar'>
                    <option class="d-none">Selecione...</option>
                    <option value="permitido">Permitido</option>
                    <option value="nao permitido">Não Permitido</option>
                </select>
                <div class="text-danger">
                    @error('editar')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-6 mb-3">
                <p class="card-category">Eliminar:</p>
                <select class="form-select" wire:model='eliminar'>
                    <option class="d-none">Selecione...</option>
                    <option value="permitido">Permitido</option>
                    <option value="nao permitido">Não Permitido</option>
                </select>
                <div class="text-danger">
                    @error('eliminar')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-6 mb-3">
                <p class="card-category">Leitura:</p>
                <select class="form-select" wire:model='leitura'>
                    <option class="d-none">Selecione...</option>
                    <option value="permitido">Permitido</option>
                    <option value="nao permitido">Não Permitido</option>
                </select>
                <div class="text-danger">
                    @error('leitura')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-3">
                <button class="btn btn-primary">Alterar Permissão</button>
            </div>
        </form>
        <hr>

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

                                    @if ($permissao->leitura == 'permitido' && $permissao->id_usuario != $usuarioLogado->id)
                                        <tr>
                                            <td>{{ $permissao->id }}</td>
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
                                                    @if ($usuarioLogado->id_acesso == 2)
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
                                                    <button type="button" data-bs-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task" 
                                                        wire:click.prevent='preencharFormulario({{$permissao->id}})'>
                                                        <i class="fa fa-edit"></i>
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
