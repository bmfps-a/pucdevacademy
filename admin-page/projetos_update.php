<?php
session_start();
require '../conexaobd/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_projeto'])) {
    $id_projeto = $_POST['id_projeto'];
    $nome_projeto = $_POST['nome_projeto'];
    $descricao = $_POST['descricao'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $status = $_POST['status'];

    $update_sql = "UPDATE Projeto SET Nome_projeto = ?, Descricao = ?, Data_Inicio = ?, Data_Fim = ?, Status = ? WHERE ID_Projeto = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssss", $nome_projeto, $descricao, $data_inicio, $data_fim, $status, $id_projeto);
    $stmt->execute();

    header("Location: ../admin-page/admin_page.php");
    exit();
} else {
    header("Location: ../admin-page/admin_page.php");
    exit();
}

$conn->close();
?>
