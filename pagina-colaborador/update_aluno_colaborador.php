<?php
session_start();
require '../conexaobd/conexao.php';

$cpf_colaborador = $_SESSION['cpf_colaborador'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selecionar'])) {
    $alunos_selecionados = $_POST['alunos_selecionados'];

    if (count($alunos_selecionados) >= 1 && count($alunos_selecionados) <= 3) {
        $update_sql = "UPDATE Aluno_puc SET fk_Colaborador_Puc_CPF = ? WHERE CPF = ?";
        $stmt = $conn->prepare($update_sql);

        foreach ($alunos_selecionados as $cpf_aluno) {
            $stmt->bind_param('ss', $cpf_colaborador, $cpf_aluno);
            $stmt->execute();
        }

        $stmt->close();

        if ($conn->affected_rows > 0) {
            header("Location: pagina_gerenciar_equipe.php?success=alunos_selecionados");
            exit();
        } else {
            header("Location: pagina_gerenciar_equipe.php?error=atualizacao_banco_dados");
            exit();
        }
    } else {
        header("Location: pagina_gerenciar_equipe.php?error=selecao_invalida");
        exit();
    }
}

header("Location: pagina_gerenciar_equipe.php");
exit();

$conn->close();
?>
