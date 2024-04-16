<?php
include("../conexaobd/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cnpj'])) {
    $cnpj = $_POST['cnpj'];
    $nome_empresa = $_POST['nome_empresa'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $ramo_empresarial = $_POST['ramo_empresarial'];
    $telefone = $_POST['telefone'];
    

    $sql = "UPDATE Empresa SET nome_empresa='$nome_empresa', nome_fantasia='$nome_fantasia', 
            ramo_empresarial='$ramo_empresarial', telefone='$telefone' WHERE cnpj='$cnpj'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Detalhes da empresa atualizados com sucesso!";
        header("refresh:2; url=usuarioteste.php");
    } else {
        echo "Erro em atualizar detalhes da ermpresa: " . mysqli_error($conn);
        header("refresh:2; url=usuarioteste.php");
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
