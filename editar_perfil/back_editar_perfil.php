<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_SESSION['emailcolaborador'])) {
    $email_login = $_SESSION['emailcolaborador'];

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
    $ra = mysqli_real_escape_string($conn, $_POST['ra']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $senhaAntiga = mysqli_real_escape_string($conn, $_POST['senhaAntiga']);
    $novaSenha = mysqli_real_escape_string($conn, $_POST['senha']);
    $confirmarSenha = mysqli_real_escape_string($conn, $_POST['confirmarSenha']);

    $sql = "UPDATE colaborador_puc SET nome='$nome', cpf='$cpf', ra='$ra', email='$email', telefone='$telefone', foto_colaborador='$fotoPerfil' WHERE email='$email_login'";

    // Executa a consulta SQL
    if (mysqli_query($conn, $sql) === FALSE) {
        echo "Erro ao atualizar os dados: " . mysqli_error($conn);
        exit();
    }

    // Verifica se uma nova senha foi fornecida e se ela coincide com a confirmação de senha
    if (!empty($novaSenha) && $novaSenha === $confirmarSenha) {
        $senhaCriptografada = md5($novaSenha);
        $senhaAntigaCriptografada = md5($senhaAntiga);

        $sqlSenha = "SELECT senha FROM colaborador_puc WHERE email='$email_login' AND senha='$senhaAntigaCriptografada'";
        $resultSenha = mysqli_query($conn, $sqlSenha);

        // Verifica se a consulta retornou algum resultado (ou seja, a senha antiga está correta)
        if (mysqli_num_rows($resultSenha) > 0) {
            $sqlUpdateSenha = "UPDATE colaborador_puc SET senha='$senhaCriptografada' WHERE email='$email_login'";

            if (mysqli_query($conn, $sqlUpdateSenha) === FALSE) {
                echo "Erro ao atualizar a senha: " . mysqli_error($conn);
                exit();
            }
        } else {
            echo "Senha antiga incorreta.";
            exit();
        }
    }

    header("Location: editar_perfil.php?success=1");
    exit();
} else {
    header("Location: ../login/login.php");
    exit();
}
?>
