<?php
session_start();
require '../conexaobd/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProjeto = $conn->real_escape_string($_POST["idProjeto"]);
    $descricao = $conn->real_escape_string($_POST["descricao"]);
    $nomeProjeto = $conn->real_escape_string($_POST["nomeProjeto"]);
    $dataInicio = $conn->real_escape_string($_POST["dataInicio"]);
    $dataFim = $conn->real_escape_string($_POST["dataFim"]);
    $status = "Em Andamento";

    if (isset($_SESSION['emailempresa'])) {
        $cnpjEmpresa = $_SESSION['fk_Empresa_CNPJ'];
    } else {
        header("Location: ../homepage/index.php");
        exit();
    }

    function verificarIdExistente($conn, $idProjeto) {
        $sql = "SELECT * FROM projeto WHERE ID_Projeto = '$idProjeto'";
        $result = $conn->query($sql);
        return $result->num_rows > 0;
    }

    if (!verificarIdExistente($conn, $idProjeto)) {
        if (!empty($idProjeto) && !empty($descricao) && !empty($nomeProjeto) && !empty($dataInicio) && !empty($dataFim) && isset($cnpjEmpresa)) {
            $sqlProjeto = "INSERT INTO projeto (ID_Projeto, Descricao, Nome_projeto, Data_Inicio, Data_Fim, Status, fk_Empresa_CNPJ) 
                            VALUES ('$idProjeto', '$descricao', '$nomeProjeto', '$dataInicio', '$dataFim', '$status', '$cnpjEmpresa')";

            if ($conn->query($sqlProjeto) === TRUE) {
                header("Location: ../homepage/index.php");
                exit();
            } else {
                echo "Erro ao cadastrar projeto: " . $conn->error;
            }
        } else {
            echo "Todos os campos são obrigatórios.";
        }
    } else {
        echo "O ID do projeto já está registrado anteriormente.";
    }
}

$conn->close();
?>
