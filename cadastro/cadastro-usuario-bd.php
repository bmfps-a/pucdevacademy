<?php 
include("../conexaobd/conexao.php");

$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$ra = $_POST["ra"];
$telefone = $_POST["telefone"];
$senha = md5($_POST["senha"]);
$camposValidos = false;



function verificarDadoExistente($conn, $campo, $valor) {
    $sql = "SELECT * FROM colaborador_puc WHERE $campo = '$valor'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true; // Dado encontrado 
    } else {
        return false; // Dado não encontrado
    }
}


if (verificarDadoExistente($conn, 'cpf', $cpf) || verificarDadoExistente($conn, 'email', $email) || verificarDadoExistente($conn, 'ra', $ra)) {
    // Gera erro informando que os dados já estão no banco de dados
    ?>
    <script>
    document.getElementById("mensagem-cpf").textContent = "Dados já registrados anteriormente!";
    document.getElementById("mensagem-email").textContent = "Dados já registrados anteriormente!";
    document.getElementById("mensagem-ra").textContent = "Dados já registrados anteriormente!";
    </script>
    <?php
} else {
    if ($camposValidos == true) {
        $sql = "INSERT INTO colaborador_puc (cpf, nome, email, ra, telefone, senha) VALUES ('$cpf','$nome', '$email', '$ra', '$telefone','$senha')";
        
        if ($conn->query($sql) === TRUE) {
            echo "FOI PRO BANCO";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
            ?>
            <script>
            alert("Tente novamente.");
            history.go(-1);        
            </script>
            <?php
        }
    }
}

$conn->close();
?>
