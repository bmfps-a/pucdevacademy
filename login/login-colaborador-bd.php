<?php
include("../conexaobd/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email-login"];
    $senha = md5($_POST["password"]);
    $sql = "SELECT * FROM Colaborador_puc WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
<<<<<<< HEAD
        $_SESSION["emailcolaborador"] = $email;
        $_SESSION["cpf_colaborador"] = $row["CPF"];

=======
>>>>>>> 88c97c19c785163a36f20374352970aace68a042
        if ($email === 'admin@pucpr.edu.br') {
            $_SESSION["emailadmin"] = $email;
            header("Location: ../admin-page/admin_page.php");
        }else{
            header("Location: ../pagina-colaborador/pagina_colaborador.php");
        }
        else {
            $_SESSION["emailcolaborador"] = $email;
        }    


        
        exit();
    } else {
        echo "Usuário ou senha incorretos!";
        header("refresh:2; url=login.php");
    }
}

$conn->close();
?>
