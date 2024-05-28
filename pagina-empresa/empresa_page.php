<?php
session_start();
include("../conexaobd/conexao.php");
if (!isset($_SESSION['emailempresa']) and !isset($_SESSION['fk_Empresa_CNPJ'])) {
    header("Location: ../homepage/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
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
    <link rel="stylesheet" href="empresa_page.css">
    <!-- JavaScript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Cadastro para Projetos</title>
</head>
<body style="background-color: #171810;">
   
    <div class="container-lg">
        <a href="../login/login.php" class="btn-voltar" ><i class="bi bi-arrow-left"></i><span id="btnBack">Voltar</span></a>
        <div class="caixa">
            <h1 class="titulo">Cadastro para Projetos</h1>
            <form id="registrar" action="empresa_page-bd.php" method="post">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="idProjeto">ID do Projeto</label>
                        <span class="mensagem" id="mensagem-idProjeto"></span>
                        <input type="text" class="form-control" id="idProjeto" name="idProjeto" pattern="[0-9]+" required maxlength="10">
                    </div>
                    <div class="col-lg-6">
                        <label for="nomeProjeto">Nome do Projeto</label>
                        <span class="mensagem" id="mensagem-nomeProjeto"></span>
                        <input type="text" class="form-control" id="nomeProjeto" name="nomeProjeto" pattern="^.{4,}" required maxlength="50">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12 mb-3">
                        <label for="descricao">Descrição</label>
                        <span class="mensagem" id="mensagem-descricao"></span>
                        <textarea class="form-control" id="descricao" name="descricao" required maxlength="1000"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="dataFim">Data de Término</label>
                        <span class="mensagem" id="mensagem-dataFim"></span>
                        <input type="date" class="form-control" id="dataFim" name="dataFim" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="dataInicio">Data de Início</label>
                        <span class="mensagem" id="mensagem-dataInicio"></span>
                        <input type="date" class="form-control" id="dataInicio" name="dataInicio" required>
                    </div>
                </div>
                <hr>
                <div class="btn-criar">
                    <button class="criarConta" type="submit">Cadastrar <i class="fas fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax
