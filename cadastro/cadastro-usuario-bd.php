<?php 
    include("../conexaobd/conexao.php");

    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $ra = $_POST["ra"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $confirmacaoSenha = $_POST["confirmarSenha"];


    if ($camposValidos == True){
        $sql = "INSERT INTO colaborador_puc (cpf, nome, email, ra, telefone, senha) VALUES ('$cpf','$nome', '$email', '$ra', '$telefone','$senha')";
        
        if ($conn->query($sql) === TRUE) {
            // header("Location: TelaDoUsuário.php?mensagem=atualizado-com-sucesso");
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

    $conn->close();
?>
