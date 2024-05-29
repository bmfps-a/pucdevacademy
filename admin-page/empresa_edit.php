<!-- <?php
// session_start();
// require '../conexaobd/conexao.php';

// if (isset($_GET['cnpj'])) {
//     $cnpj = $_GET['cnpj'];

//     $sql = "SELECT * FROM empresa WHERE CNPJ = '$cnpj'";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $cnpj = $row["CNPJ"];
//         $nome_empresa = $row["Nome_empresa"];
//         $nome_fantasia = $row["Nome_fantasia"];
//         $ramo_empresarial = $row["Ramo_empresarial"];
//         $telefone = $row["telefone"];

//     } else {
//         echo "empresa não encontrada.";
//         exit();
//     }
// } else {
//     header("Location: ../admin-page/empresa.php");
//     exit();
// }
?> -->


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
    <link rel="stylesheet" href="../admin-page/empresa_edit.css">
    <!-- JavaScript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>Editar Dados da Empresa</title>
</head>

<body>
    <div class="container-lg bg-color-black">
        <a href="../admin-page/admin_page.php" class="btn-voltar"><i class="bi bi-arrow-left"></i><span id="btnBack">Voltar</span></a>
        <div class="caixa">
            <h1 class="titulo">Editar Dados da empresa</h1>
            <form id="editar" action="empresa_update.php" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                <div class="col-lg-6">
                        <label for="nome_empresa">Nome da Empresa</label>
                        <span class="mensagem" id="mensagem-nome_empresa"></span>
                        <input type="nome_empresa" value="<?php echo htmlspecialchars($nome_empresa); ?>" class="form-control" id="nome_empresa" name="nome_empresa" pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" maxlength="50" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="nome_fantasia">Nome_fantasia</label>
                        <span class="mensagem" id="mensagem-nome_fantasia"></span>
                        <input type="text" value="<?php echo htmlspecialchars($nome_fantasia); ?>" class="form-control" id="nome_fantasia" name="nome_fantasia" pattern="(?:[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*[A-Za-zÀ-ÖØ-öø-ÿçÇ]){4}[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*" maxlength="50" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="cnpj">CNPJ</label>
                        <span class="mensagem" id="mensagem-cnpj"></span>
                        <input type="text" value="<?php echo htmlspecialchars($cnpj); ?>" class="form-control" id="cnpj" name="cnpj" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
                    </div>                 
                    <div class="col-lg-6">
                        <label for="telefone">Telefone</label>
                        <span class="mensagem" id="mensagem-tel"></span>
                        <input type="tel" value="<?php echo htmlspecialchars($telefone); ?>" class="form-control" id="tel" name="telefone" pattern="(\(\d{2}\) \d{5}-\d{4}|(\d{2} [89]\d{4}-\d{4}))" required>
                    </div>
                </div>
                <hr class="mt-4">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="senhaAntiga">Senha antiga</label>
                        <span class="mensagem" id="mensagem-senha"></span>
                        <input type="password" class="form-control" id="senhaAntiga" name="senhaAntiga">
                    </div>
                    <div class="col-lg-6">
                        <label for="senha">Nova Senha</label>
                        <span class="mensagem" id="mensagem-senha"></span>
                        <input type="password" class="form-control" id="senha" name="senha" pattern="^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$" maxlength="50">
                        <span id="descsenha">6 caracteres (uma letra maiúscula e um número)</span>
                    </div>
                    <div class="col-lg-6">
                        <label for="confirmarSenha">Confirmar Senha</label>
                        <span class="mensagem" id="mensagem-confirmarSenha"></span>
                        <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" pattern=".+">
                    </div>
                </div>
                <div class="btn-criar">
                    <button class="editarConta" type="submit">Salvar<i class="fas fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script src="../editar_perfil/editar_empresa.js"></script>
</body>

</html> 