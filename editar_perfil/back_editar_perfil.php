<?php
session_start();
require '../conexaobd/conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../login/login.php");
    exit;
}

// Recupera o CPF do usuário logado da sessão
$user_cpf = $_SESSION['user_cpf'];

// Consulta SQL para buscar os dados do usuário
$sql = "SELECT nome, cpf, ra, email, telefone FROM usuarios WHERE cpf = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_cpf);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$nome = $user['nome'];
$cpf = $user['cpf'];
$ra = $user['ra'];
$email = $user['email'];
$telefone = $user['telefone'];

$stmt->close();
$conn->close();
?>
