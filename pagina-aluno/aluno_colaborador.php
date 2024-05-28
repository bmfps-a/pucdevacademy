<?php
session_start();
require '../conexaobd/conexao.php';

$emailAluno = isset($_SESSION['emailaluno']) ? $_SESSION['emailaluno'] : '';

$sql = "SELECT c.Nome, c.Telefone, c.Email
        FROM Aluno_puc a
        LEFT JOIN Colaborador_Puc c ON a.fk_Colaborador_Puc_CPF = c.CPF
        WHERE a.Email = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $emailAluno);
    $stmt->execute();
    $result = $stmt->get_result();
    $colaborador = $result->fetch_assoc();
    $stmt->close();
} else {
    $colaborador = null;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Colaborador</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./aluno_page.css">
</head>
<body>
    <div class="container">
        <h2>Detalhes do Seu Colaborador</h2>
        <?php if ($colaborador): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($colaborador['Nome']); ?></td>
                        <td><?php echo htmlspecialchars($colaborador['Telefone']); ?></td>
                        <td><?php echo htmlspecialchars($colaborador['Email']); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você ainda não tem um colaborador associado.</p>
        <?php endif; ?>
    </div>
</body>
</html>
