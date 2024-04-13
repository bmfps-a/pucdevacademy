<?php 
session_start(); // informa ao PHP que iremos trabalhar com sessão
require '../conexaobd/conexao.php';

$cpf = $conn->real_escape_string($_POST["cpf"]);
$nome = $conn->real_escape_string($_POST["nome"]);
$email = $conn->real_escape_string($_POST["email"]);
$ra = $conn->real_escape_string($_POST["ra"]);
$telefone = $conn->real_escape_string($_POST["telefone"]);

$senha = md5($_POST["senha"]);

function verificarDadoExistente($conn, $campo, $valor) {
    $sql = "SELECT * FROM colaborador_puc WHERE $campo = '$valor'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
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
    if (!empty($cpf) && !empty($nome) && !empty($email) && !empty($ra) && !empty($telefone) && !empty($senha)) {
        $sql = "INSERT INTO colaborador_puc(cpf, nome, email, ra, telefone, senha) VALUES ('$cpf','$nome', '$email', '$ra', '$telefone','$senha')";
        
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
    } else {
        echo "Todos os campos são obrigatórios.";
    }
}

$conn->close();
?>
