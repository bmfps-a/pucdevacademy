<?php
session_start();
require '../conexaobd/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cnpj'])) {
    $cnpj = $_POST['cnpj'];
    $nomeEmpresa = $_POST['nome_empresa'];
    $nomeFantasia = $_POST['nome_fantasia'];
    $ramoEmpresarial = $_POST['ramo_empresarial'];
    $telefone = $_POST['telefone'];

    $update_sql = "UPDATE Empresa SET Nome_empresa = ?, Nome_fantasia = ?, Ramo_empresarial = ?, Telefone = ? WHERE CNPJ = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssss", $nomeEmpresa, $nomeFantasia, $ramoEmpresarial, $telefone, $cnpj);
    $stmt->execute();

    header("Location: ../admin-page/empresas.php");
    exit();
} else {
    header("Location: ../admin-page/empresas.php");
    exit();
}

$conn->close();
?>

