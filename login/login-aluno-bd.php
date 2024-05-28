<?php
include("../conexaobd/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email-login"];
    $senha = md5($_POST["password"]);
    $sql = "SELECT * FROM Aluno_puc WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION["emailaluno"] = $email;
        header("Location: ../pagina-aluno/aluno_page.php");
        exit();
    } else {
        echo "Usuário ou senha incorretos!";
        header("refresh:2; url=login.php");
    }
}

$conn->close();
?>
