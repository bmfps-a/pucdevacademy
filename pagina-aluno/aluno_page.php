<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    // Consulta para verificar se o aluno está associado a um colaborador
    $sql = "SELECT c.Nome, c.Telefone 
            FROM Aluno_puc a 
            LEFT JOIN Colaborador_Puc c 
            ON a.fk_Colaborador_Puc_CPF = c.CPF";   
           
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($nomeColaborador, $telefoneColaborador);
            $stmt->fetch();
            
            if ($nomeColaborador && $telefoneColaborador) {
                $colaborador = "Nome do Colaborador: $nomeColaborador<br>Telefone: $telefoneColaborador";
            } else {
                $colaborador = "Não está inscrito em nenhum projeto";
            }
        } else {
            $colaborador = "Não está inscrito em nenhum projeto";
        }
        
        $stmt->close();
    } else {
        $colaborador = "Erro na consulta ao banco de dados";
    }
} else {
    $colaborador = "CPF não fornecido";
}

// Verifica se o email do aluno está na sessão e exibe no canto superior direito
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
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-rocket"></i>
                        <span>Seu Projeto</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-pencil-alt"></i>
                        <span>Seu Colaborador</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="../homepage/index.php" class="sidebar-link">
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
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">Página do Projeto</h3>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card border-0">
                                    <div class="card-body py-4">
                                        <h5 class="mb-2 fw-bold">
                                            Projeto X
                                        </h5>
                                        <p class="mb-2 fw-bold">
                                            Realizar sistema MVC
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                90.0% para concluir
                                            </span>
                                            <span class="fw-bold">
                                                atualizado: 30 min
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card border-0">
                                <div class="card-body py-4">
                                    <h5 class="mb-2 fw-bold">Informações do Colaborador</h5>
                                    <p class="mb-2">
                                        <?php echo $colaborador; ?>
                                    </p>
                                </div>  
                            </div>
                        </div>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous
