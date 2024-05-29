<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_GET['cnpj'])) {
    $cnpj = $_GET['cnpj'];

    $sql = "SELECT * FROM Empresa WHERE CNPJ = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cnpj);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome_empresa = $row["Nome_empresa"];
        $nome_fantasia = $row["Nome_fantasia"];
        $ramo_empresarial = $row["Ramo_empresarial"];
        $telefone = $row["Telefone"];
    } else {
        echo "Empresa não encontrada.";
        exit();
    }
} else {
    header("Location: ../admin-page/empresas.php");
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
    <link rel="stylesheet" href="../admin-page/empresa_edit.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Editar Dados da Empresa</title>
</head>

<body>
    <div class="container-lg bg-color-black">
        <a href="../admin-page/admin_page.php" class="btn-voltar"><i class="bi bi-arrow-left"></i><span id="btnBack">Voltar</span></a>
        <div class="caixa">
            <h1 class="titulo">Editar Dados da Empresa</h1>
            <form id="editar" action="empresas_update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="cnpj" value="<?php echo $cnpj; ?>">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="nome_empresa">Nome da Empresa</label>
                        <input type="text" value="<?php echo htmlspecialchars($nome_empresa); ?>" class="form-control" id="nome_empresa" name="nome_empresa" maxlength="50" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nome_fantasia">Nome Fantasia</label>
                        <input type="text" value="<?php echo htmlspecialchars($nome_fantasia); ?>" class="form-control" id="nome_fantasia" name="nome_fantasia" maxlength="50" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="ramo_empresarial">Ramo Empresarial</label>
                        <input type="text" value="<?php echo htmlspecialchars($ramo_empresarial); ?>" class="form-control" id="ramo_empresarial" name="ramo_empresarial" maxlength="50" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="telefone">Telefone</label>
                        <input type="tel" value="<?php echo htmlspecialchars($telefone); ?>" class="form-control" id="telefone" name="telefone" pattern="\(\d{2}\) \d{5}-\d{4}" required>
                    </div>
                </div>
                <hr class="mt-4">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</body>

</html>
