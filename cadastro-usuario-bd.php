<?php 
session_start();
require '../conexaobd/conexao.php';

$cpf = $conn->real_escape_string($_POST["cpf"]);
$nome = $conn->real_escape_string($_POST["nome"]);
$email = $conn->real_escape_string($_POST["email"]);
$ra = $conn->real_escape_string($_POST["ra"]);
$telefone = $conn->real_escape_string($_POST["telefone"]);

$senha = md5($_POST["senha"]);

function verificarDadoExistente($conn, $campo, $valor) {
    $sql = "SELECT * FROM Colaborador_Puc WHERE $campo = '$valor'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

if (verificarDadoExistente($conn, 'CPF', $cpf) || verificarDadoExistente($conn, 'Email', $email) || verificarDadoExistente($conn, 'RA', $ra)) {
    ?>
    <script>
    document.getElementById("mensagem-cpf").textContent = "Dados já registrados anteriormente!";
    document.getElementById("mensagem-email").textContent = "Dados já registrados anteriormente!";
    document.getElementById("mensagem-ra").textContent = "Dados já registrados anteriormente!";
    </script>
    <?php
} else {
    if (!empty($cpf) && !empty($nome) && !empty($email) && !empty($ra) && !empty($telefone) && !empty($senha)) {
        $sql = "INSERT INTO Colaborador_Puc(CPF, Nome, Email, RA, Telefone, Senha, Foto_colaborador, fk_Projeto_ID_Projeto) VALUES ('$cpf','$nome', '$email', '$ra', '$telefone','$senha', NULL, NULL)";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: ../login/login.php");
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
            ?>
            <script>
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
