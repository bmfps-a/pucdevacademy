<?php
include("../conexaobd/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email-login"];
    $senha = md5($_POST["password"]);
    $sql = "SELECT * FROM Colaborador_puc WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Obtém os dados do banco de dados
        session_start();
        $_SESSION["emailcolaborador"] = $email;
        $_SESSION["cpf_colaborador"] = $row["CPF"];
        if ($email === 'admin@pucpr.edu.br') {
            $_SESSION["emailadmin"] = $email;
            header("Location: ../admin-page/admin_page.php");
            exit(); // Importante: encerre o script após redirecionamento
        } else {
            header("Location: ../pagina-colaborador/pagina_colaborador.php");
            exit(); // Importante: encerre o script após redirecionamento
        }
    } else {
        echo "Usuário ou senha incorretos!";
        header("refresh:2; url=login.php");
        exit(); // Importante: encerre o script após redirecionamento
    }
}

$conn->close();
?>
