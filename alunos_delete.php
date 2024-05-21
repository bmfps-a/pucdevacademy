<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de Exclusão</title>
    <!-- Inclua o Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Botão para abrir o modal de confirmação -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Excluir Aluno</button>

    <!-- Modal de confirmação -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este aluno?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <!-- Botão de confirmação -->
                    <button type="button" class="btn btn-danger" onclick="confirmarExclusao('<?php echo $cpf; ?>')">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclua o Bootstrap JS e jQuery para o modal funcionar -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script para enviar a solicitação de exclusão ao clicar em 'Confirmar' -->
    <script>
        function confirmarExclusao(cpf) {
            // Enviar solicitação para o script PHP de exclusão
            window.location.href = 'alunos_delete.php?cpf=' + cpf;
        }
    </script>
</body>
</html>
<?php
} else {
    echo "CPF não especificado.";
}

$conn->close();
?>
