<?php
session_start();
require '../conexaobd/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $ra = $_POST['ra'];
    $telefone = $_POST['telefone'];

    $update_sql = "UPDATE Colaborador_Puc SET Nome = ?, Email = ?, RA = ?, Telefone = ? WHERE CPF = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssss", $nome, $email, $ra, $telefone, $cpf);
    $stmt->execute();

    header("Location: ../admin-page/admin_page.php");
    exit();
} else {
    header("Location: ../admin-page/admin_page.php");
    exit();
}

$conn->close();
?>
