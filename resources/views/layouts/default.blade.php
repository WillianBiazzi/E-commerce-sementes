@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        function ConfirmaExclusao(id) {
            swal.fire({
                title: "Confirma a exclusão?",
                text: "Esta ação não poderá ser revertida!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085D6",
                cancelButtonColor: "#D33",
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Cancelar!",
                closeOnConfirm: false,
                focusCancel: true,
            }).then(function(isConfirm) {
                if(isConfirm.value) {
                    $.get('/' + @yield('table-delete') + '/destroy?id=' + id, function(data) {
                        //success data
                        console.log(data);
                        if(data.status == 200) {
                            swal.fire(
                            "Deletado!",
                            "Exclusão confirmada.",
                            "success"
                            ).then(function() {
                                window.location.reload();
                            });
                        } else {
                            swal.fire(
                            "Erro!",
                            "Ocorreram erros na exclusão. Entre em contato com o suporte.",
                            "error"
                            );
                        }
                    });
                }
            });
        }
    </script>
