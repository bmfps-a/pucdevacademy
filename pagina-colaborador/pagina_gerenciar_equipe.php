<?php
session_start();
require '../conexaobd/conexao.php';
$cpf_colaborador = $_SESSION['cpf_colaborador'];

// Verifica se o formulário foi submetido para selecionar alunos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selecionar'])) {
    $alunos_selecionados = $_POST['alunos_selecionados'];

    // Verifica se foram selecionados de 1 a 3 alunos
    if (count($alunos_selecionados) >= 1 && count($alunos_selecionados) <= 3) {
        // Atualiza os registros dos alunos selecionados no banco de dados
        $update_sql = "UPDATE Aluno_puc SET fk_Colaborador_Puc_CPF = ? WHERE CPF = ?";
        $stmt = $conn->prepare($update_sql);

        foreach ($alunos_selecionados as $cpf_aluno) {
            $stmt->bind_param('ss', $cpf_colaborador, $cpf_aluno); // 'ss' indica que são dois valores string
            $stmt->execute();
        }

        $stmt->close();

        // Verifica se houve atualizações bem-sucedidas no banco de dados
        if ($conn->affected_rows > 0) {
            // Redireciona para a mesma página após a seleção
            header("Location: pagina_gerenciar_equipe.php?success=alunos_selecionados");
            exit();
        } else {
            // Redireciona com uma mensagem de erro caso não haja atualizações no banco de dados
            header("Location: pagina_gerenciar_equipe.php?error=atualizacao_banco_dados");
            exit();
        }
    } else {
        // Caso a seleção de alunos seja inválida, você pode redirecionar ou exibir uma mensagem de erro
        header("Location: pagina_gerenciar_equipe.php?error=selecao_invalida"); // ou exiba uma mensagem de erro
        exit();
    }
}

// Consulta SQL para obter alunos sem colaborador associado
$sql = "SELECT * FROM Aluno_puc WHERE fk_Colaborador_Puc_CPF IS NULL";
$result = $conn->query($sql);

// Verifica se há resultados antes de exibir a tabela
if ($result->num_rows > 0) {
    $alunos = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $alunos = []; // Caso não haja alunos sem colaborador associado
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos sem Colaborador Associado</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Alunos sem Colaborador Associado</h2>
        <?php if (!empty($alunos)): ?>
            <form method="post" action="update_aluno_colaborador.php">
                <table class="table">
                    <thead>
                        <tr>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>RA</th>
                            <th>Foto</th>
                            <th>Telefone</th>
                            <th>Selecionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alunos as $aluno): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($aluno['CPF']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['Nome']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['Email']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['Ra']); ?></td>
                                <td><img src="data:image/jpeg;base64,<?php echo base64_encode($aluno['Foto_aluno']); ?>" alt="Foto Aluno" style="width: 100px; height: 100px;"></td>
                                <td><?php echo htmlspecialchars($aluno['Telefone']); ?></td>
                                <td>
                                    <input type="checkbox" name="alunos_selecionados[]" value="<?php echo htmlspecialchars($aluno['CPF']); ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" name="selecionar" class="btn btn-primary">Selecionar Alunos</button>
            </form>
        <?php else: ?>
            <p>Nenhum aluno está sem colaborador associado.</p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pF3WhENqqXJlSS7XebYpZ30clWs0U7S/J5nTrWplzOHny/jI/03F
</body>
</html>
