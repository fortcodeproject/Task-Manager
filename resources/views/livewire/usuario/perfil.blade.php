<div class="container ">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Perfil</h3>
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
                    </div>
        
                    <div class="row">
                        <div class="col-12 mb-3">
                            <p class="card-category">Nome:</p>
                            <h4 class="card-title">{{$usuario->name}}</h4>
                        </div>
                        <div class="col-12 mb-3">
                            <p class="card-category">E-mail:</p>
                            <h4 class="card-title">{{$usuario->email}}</h4>
                        </div>
                        <div class="col-12 mb-3">
                            <p class="card-category">Acesso:</p>
                            <h4 class="card-title">{{$usuario->buscarAcesso->tipo}}</h4>
                        </div>
                        <div class="col-12 mb-3">
                            <p class="card-category">Criação de tarefas:</p>
                            <h4 class="card-title">
                            @php
                                if($usuario->criacao_tarefa == "permitido"){
                                    echo "Permitido";
                                }else{
                                    echo "Não Permitido";
                                }
                            @endphp
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>