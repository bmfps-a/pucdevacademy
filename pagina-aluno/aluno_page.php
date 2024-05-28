<?php
session_start();
require '../conexaobd/conexao.php';

$emailAluno = isset($_SESSION['emailaluno']) ? $_SESSION['emailaluno'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Aluno</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./aluno_page.css">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">PUC DevAcademy</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-target="aluno_projeto.php" data-category="Seu Projeto">
                        <i class="lni lni-rocket"></i>
                        <span>Seu Projeto</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-target="aluno_colaborador.php" data-category="Seu Colaborador">
                        <i class="lni lni-pencil-alt"></i>
                        <span>Seu Colaborador</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a onclick="redirecionar()" id="sair" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Sair</span>
                </a>
            </div>
            
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">
                    <div class="input-group input-group-navbar">
                        <input type="text" class="form-control border-0 rounder-0" placeholder="Pesquisar...">
                        <button class="btn border-0 rounder-0" type="button">
                            Pesquisar
                        </button>
                    </div>
                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="/account.png" class="avatar img-fluid" alt="">
                                <?php echo $emailAluno; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">
                <div id="content" class="container-fluid">
                    <h3 class="fw-bold fs-4 mb-3">Bem-vindo</h3>
                    <p>Selecione uma opção no menu à esquerda.</p>
                </div>
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-body-secondary">
                        <div class="col-6 text-start">
                            <a class="text-body-secondary" href="#"><strong>PUC Dev Academy</strong></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pF3WhENqqXJlSS7XebYpZ30clWs0U7S/J5nTrWplzOHny/jI/03F5I6sjmQJ5iBA" crossorigin="anonymous"></script>
    <script src="./aluno_page.js"></script>
</body>
</html>
