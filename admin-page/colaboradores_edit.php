<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    $sql = "SELECT * FROM Colaborador_Puc WHERE CPF = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["Nome"];
        $email = $row["Email"];
        $ra = $row["RA"];
        $telefone = $row["Telefone"];
    } else {
        echo "Colaborador não encontrado.";
        exit();
    }
} else {
    header("Location: ../admin-page/colaboradores.php");
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
    <!-- Google Fonts - Saira condensed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS DO PROJETO -->
    <link rel="stylesheet" href="../admin-page/colaboradores_edit.css">
    <!-- JavaScript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Editar Colaborador</title>
</head>

<body>
    <a href="../admin-page/admin_page.php" class="btn-voltar"><i class="bi bi-arrow-left"></i><span id="btnBack">Voltar</span></a>
    <div class="container-lg bg-color-black">
        <div class="caixa">
            <h1 class="titulo">Editar Colaborador</h1>
            <form action="colaboradores_update.php" method="POST">
                <input type="hidden" name="cpf" value="<?php echo $cpf; ?>">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" class="form-control" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form-control" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="ra">RA:</label>
                        <input type="text" id="ra" name="ra" value="<?php echo $ra; ?>" class="form-control" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" id="telefone" name="telefone" value="<?php echo $telefone; ?>" class="form-control" required>
                    </div>
                </div>
                <hr class="mt-4">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</body>

</html>

