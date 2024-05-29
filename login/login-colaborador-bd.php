<?php
include("../conexaobd/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email-login"];
    $senha = md5($_POST["password"]);
    $sql = "SELECT * FROM Colaborador_puc WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        if ($email === 'admin@pucpr.edu.br') {
            $_SESSION["emailadmin"] = $email;
        }
        else {
            $_SESSION["emailcolaborador"] = $email;
        }    


        header("Location: ../admin-page/admin_page.php");
        exit();
    } else {
        echo "Usuário ou senha incorretos!";
        header("refresh:2; url=login.php");
    }
}

$conn->close();
?>
