<?php
include("../conexaobd/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cnpj'])) {
    $cnpj = $_GET['cnpj'];
    
    
    $sql = "DELETE FROM Empresa WHERE cnpj='$cnpj'";
    if (mysqli_query($conn, $sql)) {
        echo "Empresa Deletada com Sucesso";
        header("refresh:2; url=usuarioteste.php");
    } else {
        echo "Erro em deletar a Empresa: " . mysqli_error($conn);
        header("refresh:2; url=usuarioteste.php");
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
