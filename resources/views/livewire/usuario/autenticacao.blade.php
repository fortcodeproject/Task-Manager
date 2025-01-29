<div class="container">
    <div>
        <h1> <i class="fas fa-edit"></i> Task Manager</h1>
        <hr>
    </div>

    <div class="container d-flex justify-content-center">
        <form wire:submit.prevent='autenticar'>
            <div>
                <h1> <i class="fas fa-user"></i> Autenticação</h1>
                <hr>
            </div>

            <div class="mb-3 mt-3 ">
                <label for="email" class="form-label">Email:</label>
                <input type="email" wire:model='email' class="form-control" placeholder="Digite o email" name="email">
                <div class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="pwd" class="form-label">Senha:</label>
                <input type="password" wire:model='senha' class="form-control" placeholder="Digite a senha"
                    name="pswd">
                <div class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success" style="min-width: 350px; ">Autenticar</button>
            </div>
        </form>
    </div>

    <div>
        <hr>
        <div class="d-flex align-items-center justify-content-between">
            <div class="text-start">
                &copy; Task Manager 2025
            </div>
            <div class="text-end">
                <i class="fa-brands fa-dev"></i> Eugénio Cachiombo
            </div>
        </div>
    </div>
</div>
