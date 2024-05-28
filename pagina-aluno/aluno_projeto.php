<?php
session_start();
require '../conexaobd/conexao.php';

$emailAluno = isset($_SESSION['emailaluno']) ? $_SESSION['emailaluno'] : '';

$sql = "SELECT p.*
        FROM Aluno_puc a
        LEFT JOIN Colaborador_Puc c ON a.fk_Colaborador_Puc_CPF = c.CPF
        LEFT JOIN Projeto p ON c.fk_Projeto_ID_Projeto = p.ID_Projeto
        WHERE a.Email = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $emailAluno);
    $stmt->execute();
    $result = $stmt->get_result();
    $projeto = $result->fetch_assoc();
    $stmt->close();
} else {
    $projeto = null;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Projeto</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./aluno_page.css">
</head>
<body>
    <div class="container">
        <h2>Detalhes do seu Projeto</h2>
        <?php if ($projeto): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID do Projeto</th>
                        <th>Nome do Projeto</th>
                        <th>Descrição</th>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($projeto['ID_Projeto']); ?></td>
                        <td><?php echo htmlspecialchars($projeto['Nome_projeto']); ?></td>
                        <td><?php echo htmlspecialchars($projeto['Descricao']); ?></td>
                        <td><?php echo htmlspecialchars($projeto['Data_Inicio']); ?></td>
                        <td><?php echo htmlspecialchars($projeto['Data_Fim']); ?></td>
                        <td><?php echo htmlspecialchars($projeto['Status']); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você ainda não está em nenhum projeto.</p>
        <?php endif; ?>
    </div>
</body>
</html>
