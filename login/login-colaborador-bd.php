<?php
include("../conexaobd/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = md5($_POST["password"]); // Convertendo a senha inserida para MD5

    // Consulta para verificar se o usuário e senha correspondem a um registro na tabela Colaborador_puc
    $sql = "SELECT * FROM Colaborador_puc WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuário autenticado com sucesso, iniciar a sessão e redirecionar para a página adequada
        session_start();
        $_SESSION["emailusuario"] = $email;
        header("Location: usuarioteste.php"); // Redirecionar para a página do usuário
        exit();
    } else {
        // Usuário ou senha incorretos, exibir mensagem de erro
        echo "Usuário ou senha incorretos!";
    }
}

$conn->close();
?>
