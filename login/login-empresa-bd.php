<?php
include("../conexaobd/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email-login"];
    $senha = md5($_POST["password"]); 
    $sql = "SELECT f.*, e.CNPJ as fk_Empresa_CNPJ FROM Funcionario f 
            INNER JOIN Empresa e ON f.fk_Empresa_CNPJ = e.CNPJ
            WHERE f.email = '$email' AND f.senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION["emailempresa"] = $email;
        
        // Buscar a fk_Empresa_CNPJ associada ao email do funcionário
        $row = $result->fetch_assoc();
        $fk_Empresa_CNPJ = $row["fk_Empresa_CNPJ"];
        $_SESSION["fk_Empresa_CNPJ"] = $fk_Empresa_CNPJ;

        header("Location: ../pagina-empresa/empresa_page.php");
        exit();
    } else {
        echo "Usuário ou senha incorretos!";
        header("refresh:2; url=login.php");
    }
}

$conn->close();
?>
