<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_GET['id'])) {
    $id_projeto = $_GET['id'];

    $sql = "SELECT * FROM Projeto WHERE ID_Projeto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_projeto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $descricao = $row["Descricao"];
        $nome_projeto = $row["Nome_projeto"];
        $data_inicio = $row["Data_Inicio"];
        $data_fim = $row["Data_Fim"];
        $status = $row["Status"];
    } else {
        echo "Projeto não encontrado.";
        exit();
    }
} else {
    header("Location: ../admin-page/projetos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/imagens/sinais-de-codigo.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./projetos_edit.css">
    <link rel="stylesheet" href="../admin-page/projeto_edit.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Editar Dados do Projeto</title>
</head>

<body>
    <div class="container-lg bg-color-black">
        <a href="../admin-page/admin_page.php" class="btn-voltar"><i class="bi bi-arrow-left"></i><span id="btnBack">Voltar</span></a>
        <div class="caixa">
            <h1 class="titulo">Editar Dados do Projeto</h1>
            <form id="editar" action="projetos_update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_projeto" value="<?php echo $id_projeto; ?>">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="nome_projeto">Nome do Projeto</label>
                        <input type="text" value="<?php echo htmlspecialchars($nome_projeto); ?>" class="form-control" id="nome_projeto" name="nome_projeto" maxlength="50" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" required maxlength="1000"><?php echo htmlspecialchars($descricao); ?></textarea>
                    </div>
                    <div class="col-lg-6">
                        <label for="data_inicio">Data de Início</label>
                        <input type="date" value="<?php echo $data_inicio; ?>" class="form-control" id="data_inicio" name="data_inicio" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="data_fim">Data de Término</label>
                        <input type="date" value="<?php echo $data_fim; ?>" class="form-control" id="data_fim" name="data_fim" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="status">Status</label>
                        <input type="text" value="<?php echo $status; ?>" class="form-control" id="status" name="status" maxlength="50" required>
                    </div>
                </div>
                <hr class="mt-4">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</body>

</html>
