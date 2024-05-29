<?php
session_start();
require '../conexaobd/conexao.php';

// Verifica se o CPF foi enviado via GET
if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    // Consulta SQL para selecionar o colaborador pelo CPF
    $sql = "SELECT * FROM Colaborador_Puc WHERE CPF = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o colaborador foi encontrado
    if ($result->num_rows > 0) {
        // Exibe os dados do colaborador
        $row = $result->fetch_assoc();
        $nome = $row["Nome"];
        $email = $row["Email"];
        $ra = $row["RA"];
        $telefone = $row["Telefone"];
        // Verifica se a chave "foto_colaborador" está definida no array $row
        $fotoColaborador = isset($row["foto_colaborador"]) ? $row["foto_colaborador"] : null;
    } else {
        // Se o colaborador não foi encontrado, redireciona para a página anterior
        header("Location: admin_page.php");
        exit();
    }
} else {
    // Se o CPF não foi enviado via GET, redireciona para a página anterior
    header("Location: admin_page.php");
    exit();
}

// Verifica se o formulário de confirmação foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmacao'])) {
    // Se a confirmação foi recebida, realiza a exclusão
    $sql_delete = "DELETE FROM Colaborador_Puc WHERE CPF = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("s", $cpf);
    $stmt_delete->execute();

    // Redireciona para a página anterior após a exclusão
    header("Location: ../admin-page/admin_page.php");
    exit();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Exclusão</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos customizados -->
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-confirmar,
        .btn-cancelar {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Confirmação de Exclusão</h1>
        <p>Você está prestes a excluir o colaborador:</p>
        <ul>
            <li><strong>Nome:</strong> <?php echo $nome; ?></li>
            <li><strong>Email:</strong> <?php echo $email; ?></li>
            <li><strong>RA:</strong> <?php echo $ra; ?></li>
            <li><strong>Telefone:</strong> <?php echo $telefone; ?></li>
        </ul>
        <p>Deseja realmente prosseguir com a exclusão?</p>
        <form method="post">
            <input type="hidden" name="confirmacao" value="confirmado">
            <button type="submit" class="btn btn-danger btn-confirmar">Confirmar Exclusão</button>
            <a href="colaboradores.php" class="btn btn-secondary btn-cancelar">Cancelar</a>
        </form>
    </div>

    <!-- Bootstrap JavaScript Bundle com Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
