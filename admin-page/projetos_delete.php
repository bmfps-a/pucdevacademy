<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_GET['id'])) {
    $idProjeto = $_GET['id'];

    $sql = "SELECT * FROM Projeto WHERE ID_Projeto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idProjeto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $descricao = $row["Descricao"];
        $nomeProjeto = $row["Nome_projeto"];
        $dataInicio = $row["Data_Inicio"];
        $dataFim = $row["Data_Fim"];
        $status = $row["Status"];
    } else {
        echo "Projeto não encontrado.";
        exit();
    }
} else {
    header("Location: ../admin-page/projetos.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmacao'])) {
    $sql_delete = "DELETE FROM Projeto WHERE ID_Projeto = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("s", $idProjeto);
    $stmt_delete->execute();

    header("Location: ../admin-page/projetos.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Confirmação de Exclusão</h1>
        <p>Você está prestes a excluir o projeto:</p>
        <ul>
            <li><strong>ID do Projeto:</strong> <?php echo $idProjeto; ?></li>
            <li><strong>Descrição:</strong> <?php echo htmlspecialchars($descricao); ?></li>
            <li><strong>Nome do Projeto:</strong> <?php echo htmlspecialchars($nomeProjeto); ?></li>
            <li><strong>Data de Início:</strong> <?php echo $dataInicio; ?></li>
            <li><strong>Data de Término:</strong> <?php echo $dataFim; ?></li>
            <li><strong>Status:</strong> <?php echo $status; ?></li>
        </ul>
        <p>Deseja realmente prosseguir com a exclusão?</p>
        <form method="post">
            <input type="hidden" name="confirmacao" value="confirmado">
            <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
            <a href="../admin-page/admin_page.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
