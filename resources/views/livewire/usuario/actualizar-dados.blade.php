<div class="container ">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Actualizar Dados</h3>
            </div>
        </div>
        <div class="row">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="col">
                            <b>
                                <h2>{{ ucwords($usuario->name) }}</h2>
                            </b>
                        </div>
                    </div>

                    <div class="row">
                        <form wire:submit.prevent="actualizar">
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
                                <p class="card-category">E-mail:</p>
                                <input type="email" wire:model='email' class="form-control"
                                    placeholder="Digite o email" name="email">
                                <div class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <button class="btn btn-primary"><i class="fas fa-pen"></i> Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
