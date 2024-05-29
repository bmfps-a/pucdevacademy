<?php
session_start();
require '../conexaobd/conexao.php';

$cpf_colaborador = isset($_SESSION['cpf_colaborador']) ? $_SESSION['cpf_colaborador'] : '';

// Verifica se o colaborador já tem um projeto associado
$sql = "SELECT fk_Projeto_ID_Projeto FROM Colaborador_Puc WHERE CPF=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $cpf_colaborador);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Verifica se $row não é nulo antes de acessar o índice
$fk_projeto = $row !== null ? $row['fk_Projeto_ID_Projeto'] : null;

if ($fk_projeto !== null) {
    // Projeto associado ao colaborador
    $sql = "SELECT * FROM Projeto WHERE ID_Projeto=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $fk_projeto);
    $stmt->execute();
    $result = $stmt->get_result();
    $projeto = $result->fetch_assoc();
} else {
    // Nenhum projeto associado ao colaborador
    $sql = "SELECT * FROM Projeto";
    $result = $conn->query($sql);
    $projetos = $result->fetch_all(MYSQLI_ASSOC);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./pagina_colaborador.css">
</head>
<body>
    <div class="container">
        <h2>Detalhes do Projeto</h2>
        <?php if ($fk_projeto !== null): ?>
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
            <?php if (isset($projetos) && count($projetos) > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID do Projeto</th>
                            <th>Nome do Projeto</th>
                            <th>Descrição</th>
                            <th>Data de Início</th>
                            <th>Data de Fim</th>
                            <th>Status</th>
                            <th>Selecionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projetos as $projeto): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($projeto['ID_Projeto']); ?></td>
                                <td><?php echo htmlspecialchars($projeto['Nome_projeto']); ?></td>
                                <td><?php echo htmlspecialchars($projeto['Descricao']); ?></td>
                                <td><?php echo htmlspecialchars($projeto['Data_Inicio']); ?></td>
                                <td><?php echo htmlspecialchars($projeto['Data_Fim']); ?></td>
                                <td><?php echo htmlspecialchars($projeto['Status']); ?></td>
                                <td>
                                    <form method="post" action="update_projeto_colaborador.php">
                                        <input type="hidden" name="id_projeto" value="<?php echo htmlspecialchars($projeto['ID_Projeto']); ?>">
                                        <button type="submit" name="selecionar_projeto" class="btn btn-primary">Selecionar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhum projeto disponível.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pF3WhENqqXJlSS7XebYpZ30clWs0U7S/J5nTrWplzOHny/jI/03F5I6sjmQJ5iBA" crossorigin="anonymous"></script>
</body>
</html>
