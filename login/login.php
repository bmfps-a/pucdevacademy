<?php
session_start();
include("../conexaobd/conexao.php");
if (isset($_SESSION['emailcolaborador']) || isset($_SESSION['emailempresa'])) {
    header("Location: ../homepage/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/sinais-de-codigo.ico" type="image/x-icon"/>
    <!-- Google Fonts - Saira condensed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS DO PROJETO -->
    <link rel="stylesheet" href="login_style.css">
    <!-- JavaScript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="verificarlogin.js"></script>
    <script src="redirecionarcriarconta.js" defer></script>
    <script src="redirecionarlogin.js" defer></script>
    <title>Login - PucDevAcademy</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
  <div class="p-4">
      <div class="container">
        <a href="../homepage/index.php" class="btn-voltar" ><i class="bi bi-arrow-left"></i><span id="btnBack">Voltar</span></a>  
        <div class="row">
              <div class="col-md-5 col-sm-6">
                  <div class="formContainer">
                      <div class="btn-group" role="group" aria-label="#">
                        <input type="radio" class="btn-check" name="tipo" id="colaborador" autocomplete="off" checked>
                        <label class="btn btn-primary btn-lg colaborador-btn" for="colaborador">Colaborador</label>      
                        <input type="radio" class="btn-check" name="tipo" id="empresa" autocomplete="off">
                        <label class="btn btn-primary btn-lg empresa-btn" for="empresa" name="empresa">Empresa</label>
                    </div>
                    
                      <form id="loginform" action="login-colaborador-bd.php" method="post">
                          <i class="bi person-icon bi-person"></i>
                          <div class="form-group">
                              <label class="mb-2" for="email">Email </label>
                              <input class="form-control" id="email" name="email-login" type="email" placeholder="email" pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" required maxlength="50"/>
                          </div>
                          <div class="form-group mt-3">
                              <label class="mb-2" for="password">Senha</label>
                              <input class="form-control" id="password" name="password" placeholder="password" type="password" pattern="^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$" required maxlength="50"/>
                              <span id="descsenha">6 caracteres (uma letra maiúscula e um número)</span>
                          </div>
                          <div class="mt-3">
                              <input type="checkbox" /> Lembrar-me
                              <span id="criarConta" onclick="redirecionar()">Crie uma conta</span>
                          </div>
                          <button class="btn btn-login w-100 mt-4" onclick="enviar()">Login</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
<script src="redirecionarcriarconta.js"></script>
</html>