<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.0.2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/geral.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all6.css') }}">
    
    <script src="{{ asset('assets/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-5.0.2/js/bootstrap.js') }}"></script>

    <script src="{{ asset('assets/js/alerta.js') }}"></script>
    <script src="{{ asset('assets/js/executar_alert.js') }}"></script>
    @livewireStyles
</head>
<body>
    <header>
        <h1> <i class="fas fa-task"></i> Task Manager</h1>
    </header>

    <main>
        {{$slot}}
    </main>

    <footer>
        <h1>Footer</h1>
    </footer>
    @livewireScripts

    <script>
        $(document).ready(function() {
            $('#minhaTabela').DataTable({
                "language": {
                    "sEmptyTable":     "Nenhum registro encontrado",
                    "sInfo":           "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered":   "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sInfoThousands":  ".",
                    "sLengthMenu":     "_MENU_ Resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing":     "Processando...",
                    "sZeroRecords":    "Nenhum registro encontrado",
                    "sSearch":         "Pesquisar",
                    "oPaginate": {
                        "sNext":     "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst":    "Primeiro",
                        "sLast":     "Último"
                    },
                    "oAria": {
                        "sSortAscending":  ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                },
                "order": [[0, 'desc']]
            });
        });
    </script>
</body>
</html>