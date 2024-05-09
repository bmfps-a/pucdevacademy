<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/imagens/sinais-de-codigo.ico" type="image/x-icon" />
    <!-- Google Fonts - Saira condensed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS DO PROJETO -->
    <link rel="stylesheet" href="editar_perfil.css">
    <!-- JavaScript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <title>Editar Perfil</title>
</head>

<body>
    <div class="container-lg bg-color-black">
        <a href="../homepage/index.php" class="btn-voltar"><i class="bi bi-arrow-left"></i><span
                id="btnBack">Voltar</span></a>
        <div class="caixa">
            <h1 class="titulo">Editar Perfil</h1>
            <form id="editar" action="funcao_editar.php" method="post">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="nome">Nome</label>
                        <span class="mensagem" id="mensagem-nome"></span>
                        <input type="text" class="form-control" id="nome" name="nome"
                            pattern="(?:[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*[A-Za-zÀ-ÖØ-öø-ÿçÇ]){4}[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*"
                            maxlength="50" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="cpf">CPF</label>
                        <span class="mensagem" id="mensagem-cpf"></span>
                        <input type="text" class="form-control" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                            required>
                    </div>
                    <div class="col-lg-6">
                        <label for="ra">RA</label>
                        <span class="mensagem" id="mensagem-ra"></span>
                        <input type="text" class="form-control" id="ra" name="ra" pattern="\d{8}" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="email">E-mail</label>
                        <span class="mensagem" id="mensagem-email"></span>
                        <input type="email" class="form-control" id="email" name="email"
                            pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" maxlength="50" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="telefone">Telefone</label>
                        <span class="mensagem" id="mensagem-tel"></span>
                        <input type="tel" class="form-control" id="tel" name="telefone"
                            pattern="(\(\d{2}\) \d{5}-\d{4}|(\d{2} [89]\d{4}-\d{4}))" required>
                    </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="senha">Senha antiga</label>
                        <span class="mensagem" id="mensagem-senha"></span>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="senha">Nova Senha</label>
                        <span class="mensagem" id="mensagem-senha"></span>
                        <input type="password" class="form-control" id="senha" name="senha"
                            pattern="^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$" maxlength="50" required>
                        <span id="descsenha">6 caracteres (uma letra maiúscula e um número)</span>
                    </div>
                    <div class="col-lg-6">
                        <label for="confirmarSenha">Confirmar Senha</label>
                        <span class="mensagem" id="mensagem-confirmarSenha"></span>
                        <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha"
                            pattern=".+" required>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="imagem">Imagem de perfil</label>
                        <div class="profile-image">
                            <img id="preview" src="#" alt="Imagem de perfil">
                            <input type="file" id="imagem" name="update_image" accept="image/jpg, image/jpeg, image/png"
                                class="box" onchange="previewImage(event)">
                        </div>
                    </div>
                </div>
                <div class="btn-editar">
                    <button class="editarConta" type="submit" onclick="enviar()">Editar <i
                            class="fas fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</html>