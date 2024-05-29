<?php
session_start();
require '../conexaobd/conexao.php';

$cpf_colaborador = isset($_SESSION['cpf_colaborador']) ? $_SESSION['cpf_colaborador'] : '';

if (isset($_POST['selecionar_projeto'])) {
    // Obtém o ID do projeto selecionado
    $id_projeto = $_POST['id_projeto'];

    // Atualiza a tabela Colaborador_Puc com o novo ID de projeto para o colaborador
    $sql_update = "UPDATE Colaborador_Puc SET fk_Projeto_ID_Projeto = ? WHERE CPF = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('is', $id_projeto, $cpf_colaborador);
    $stmt_update->execute();

    // Redireciona de volta para a página anterior após a atualização
    header("Location: pagina_colaborador.php");
    exit();
} else {
    // Caso o botão de seleção não tenha sido clicado, redireciona para a página anterior
    header("Location: pagina_colaborador_projetos.php");
    exit();
}

$conn->close();
?>
