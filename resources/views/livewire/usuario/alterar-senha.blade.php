<div class="container ">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Alterar Senha</h3>
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
                        <form wire:submit.prevent="alterar">
                            <div class="col-6 mb-3">
                                <p class="card-category">Senha Actual:</p>
                                <input type="text" wire:model='senhaActual' class="form-control"
                                    placeholder="Digite a senha actual" name="senhaActual"
                                    wire:keyup='verificarSenhaActual'>
                                <div class="text-danger">
                                    @if ($msgSenhaActual != null)
                                        {{ $msgSenhaActual }}
                                    @else
                                        @error('senhaActual')
                                            {{ $message }}
                                        @enderror
                                    @endif
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <p class="card-category">Senha Nova:</p>
                                <input type="text" wire:model='senhaNova' class="form-control"
                                    placeholder="Digite a senha nova" 
                                    name="senhaNova" wire:keyup='verificarSenhaNova'>
                                <div class="text-danger">
                                    @if ($msgSenhaNova != null)
                                        {{ $msgSenhaNova }}
                                    @else
                                        @error('senhaNova')
                                            {{ $message }}
                                        @enderror
                                    @endif
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <p class="card-category">Confirmar senha:</p>
                                <input type="text" wire:model='senhaConfirmacao' class="form-control"
                                    placeholder="Digite a senha de confirmação"
                                     name="senhaConfirmacao" wire:keyup='verificarSenhaConfirmacao'>
                                <div class="text-danger">
                                    @if ($msgSenhaConfirmacao != null)
                                        {{ $msgSenhaConfirmacao }}
                                    @else
                                        @error('senhaConfirmacao')
                                            {{ $message }}
                                        @enderror
                                    @endif
                                </div>
                            </div>


                            <div class="col-12 mb-3">
                                <button class="btn btn-primary"><i class="fas fa-pen"></i> Alterar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
