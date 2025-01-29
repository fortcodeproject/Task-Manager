<div class="container ">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Usuário</h3>
                <h6 class="op-7 mb-2">Criar um usuário</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
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
        </div>

        <h3 class="fw-bold mb-3">Criar Novo</h3>
        <form class="row" wire:submit.prevent="criar">
            <div class="col-6 mb-3">
                <p class="card-category">Nome:</p>
                <input type="text" wire:model='nome' class="form-control" placeholder="Digite o nome"
                    name="nome">
                <div class="text-danger">
                    @error('nome')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-6 mb-3">
                <p class="card-category">Email:</p>
                <input type="text" wire:model='email' class="form-control" placeholder="Digite o email"
                    name="email">
                <div class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-6 mb-3">
                <p class="card-category">Criação de Tarefas:</p>
                <select class="form-select" wire:model='criacao_tarefa'>
                    <option class="d-none">Selecione...</option>
                    <option value="permitido">Permitido</option>
                    <option value="nao permitido">Não Permitido</option>
                </select>
                <div class="text-danger">
                    @error('criacao_tarefa')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-3">
                <button class="btn btn-primary">Criar Usuário</button>
            </div>
        </form>
    </div>
</div>
