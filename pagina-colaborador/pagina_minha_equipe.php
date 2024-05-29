<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_SESSION['emailcolaborador'])) {
    $cpf_colaborador = $_SESSION['cpf_colaborador'];

    // Consulta SQL para obter alunos da equipe do colaborador
    $sql = "SELECT CPF, Nome, Telefone, Email, Foto_aluno FROM Aluno_puc WHERE fk_Colaborador_Puc_CPF = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('s', $cpf_colaborador);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $alunos = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $alunos = []; // Caso não haja alunos associados à equipe do colaborador
        }
    } else {
        echo "Erro na preparação da consulta SQL.";
        exit();
    }
} else {
    header("Location: ../login/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Equipe</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Minha Equipe</h2>
        <?php if (!empty($alunos)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($aluno['CPF']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['Nome']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['Email']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['Telefone']); ?></td>
                            <td><img src="data:image/jpeg;base64,<?php echo base64_encode($aluno['Foto_aluno']); ?>" alt="Foto Aluno" style="width: 100px; height: 100px;"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum aluno está associado à sua equipe.</p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pF3WhENqqXJlSS7XebYpZ30clWs0U7S/J5nTrWplzOHny/jI/03F5I6sjmQJ5iBA" crossorigin="anonymous"></script>
</body>

</html>
