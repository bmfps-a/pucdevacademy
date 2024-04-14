<?php 
session_start(); 
require '../conexaobd/conexao.php';

$cnpj = $conn->real_escape_string($_POST["cnpj"]);
$nomeEmpresa = $conn->real_escape_string($_POST["nomeEmpresa"]);
$nomeFic = $conn->real_escape_string($_POST["nomeFic"]);
$ramo = $conn->real_escape_string($_POST["ramo"]);
$tel = $conn->real_escape_string($_POST["tel"]);
$nomeRepresentante = $conn->real_escape_string($_POST["nomeRepresentante"]);
$cpf = $conn->real_escape_string($_POST["cpf"]);
$cargo = $conn->real_escape_string($_POST["cargo"]);
$email = $conn->real_escape_string($_POST["email"]);
$senha = md5($_POST["senha"]);

function verificarDadoExistente($conn, $campo, $valor) {
    $sql = "SELECT * FROM empresa WHERE $campo = '$valor'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

if (verificarDadoExistente($conn, 'cnpj', $cnpj)) {
    
    ?>
    <script>
    document.getElementById("mensagem-cnpj").textContent = "CNPJ já registrado anteriormente!";
    </script>
    <?php
} else {
    // Inserindo dados na tabela 'empresa'
    $sqlEmpresa = "INSERT INTO empresa(cnpj, nome_empresa, nome_fantasia, ramo_empresarial, telefone) 
                    VALUES ('$cnpj', '$nomeEmpresa', '$nomeFic', '$ramo', '$tel')";

    if ($conn->query($sqlEmpresa) === TRUE) {
        // Recupera o ID da empresa recém-inserida
        $idEmpresa = $conn->insert_id;

        // Inserindo dados na tabela 'funcionario'
        $sqlFuncionario = "INSERT INTO funcionario(cpf, nome, cargo, email, senha, empresa_id) 
                            VALUES ('$cpf', '$nomeRepresentante', '$cargo', '$email', '$senha', $idEmpresa)";
        
        if ($conn->query($sqlFuncionario) === TRUE) {
            header("Location: ../login/login.php");
        } else {
            echo "Erro ao cadastrar funcionário: " . $conn->error;
        }
        
    } else {
        echo "Erro ao cadastrar empresa: " . $conn->error;
    }
}

$conn->close();
?>
