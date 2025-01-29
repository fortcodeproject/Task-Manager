<div class="container ">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Usuário</h3>
                <h6 class="op-7 mb-2">Listegem de todas as usuário</h6>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Todas Usuário</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="minhaTabela" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Acesso</th>
                                    <th>Criação de Tarefa</th>
                                    <th style="width: 10%">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($usuarios as $item)
                                    <tr>
                                        <td >{{ $item->id }}</td>
                                        <td style="white-space: nowrap">{{ $item->name }}</td>
                                        <td style="white-space: nowrap">{{ $item->email }}</td>
                                        <td style="white-space: nowrap">{{ ucwords($item->buscarAcesso->tipo) }}</td>
                                        <td style="white-space: nowrap">{{ ucwords($item->criacao_tarefa) }}</td>
                                        

                                        <td>
                                            <div class="form-button-action">
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

