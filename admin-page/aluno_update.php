<?php
session_start();
require '../conexaobd/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $ra = $_POST['ra'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE aluno_puc SET Nome = ?, Ra = ?, Email = ?, Telefone = ? WHERE CPF = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $ra, $email, $telefone, $cpf);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: ../admin-page/admin_page.php");
        exit();
    } else {
        header("Location: ../admin-page/admin_page.php");
    }

    $stmt->close();
} else {
    header("Location: ../admin-page/alunos.php");
    exit();
}
?>
