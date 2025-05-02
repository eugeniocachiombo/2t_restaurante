<!--Data Table em portugês -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatablePT/dataTable.css') }}">
<script src="{{ asset('assets/datatablePT/dataTable.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.datatablePT').DataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ Resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            "order": [
                [0, 'desc']
            ]
        });
    });
</script>
<!-- Select 2-->
<script src="{{ asset('assets/select2/select2.js') }}"></script>
@livewireScripts
@stack('scripts')