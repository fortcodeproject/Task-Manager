<div class="container ">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tarefas</h3>
                <h6 class="op-7 mb-2">Actualizar uma tarefa</h6>
            </div>
        </div>
        <div class="row">
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
                                <div class="icon-big text-center icon-warning bubble-shadow-small">
                                    <i class="fas fa-spinner"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Em Andamento</p>
                                    <h4 class="card-title">{{ count($trAndamento) }}</h4>
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
                                    <p class="card-category">Finalizadas</p>
                                    <h4 class="card-title">{{ count($trFinalizadas) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="fw-bold mb-3">Criar Nova</h3>
        <form class="row" wire:submit.prevent="criar">
            <div class="col-6 mb-3">
                <p class="card-category">Título:</p>
                <input type="text" wire:model='titulo' class="form-control" placeholder="Digite o título"
                    name="titulo">
                <div class="text-danger">
                    @error('titulo')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-6 mb-3">
                <p class="card-category">Usuário Especifíco:</p>
                <select class="form-select" wire:model='usuarioEspecifico'>
                    <option class="d-none">Selecione...</option>
                    @foreach ($usuarios as $item)
                        <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-6 mb-3">
                <p class="card-category">Descrição:</p>
                <textarea type="text" wire:model='descricao' class="form-control" placeholder="Escreva a descrição" name="descricao"></textarea>
                <div class="text-danger">
                    @error('descricao')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-3">
                <button class="btn btn-primary">Criar Tarefa</button>
            </div>
        </form>
    </div>
</div>
