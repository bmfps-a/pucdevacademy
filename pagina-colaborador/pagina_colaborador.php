<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_SESSION['emailcolaborador'])) {
    $email_login = $_SESSION['emailcolaborador'];
    $cpf_colaborador = $_SESSION['cpf_colaborador'];

    $sql = "SELECT CPF, Nome, Email FROM Colaborador_Puc WHERE Email=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('s', $email_login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cpf_colaborador = $row["CPF"];
            $email = $row["Email"];
        } else {
            echo "Usuário não encontrado.";
            exit();
        }
    } else {
        echo "Erro na preparação da consulta SQL.";
        exit();
    }
} else {
    header("Location: ../login/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Colaborador</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="pagina_colaborador.css">
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
                    <a class="sidebar-link" id="editar-perfil-colaborador" onclick="redirecionarEditarPerfilColaborador()">
                        <i class="lni lni-pencil"></i>
                        <span>Editar Perfil</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" onclick="loadContent('pagina_colaborador_projetos.php')">
                        <i class="lni lni-rocket"></i>
                        <span>Projeto</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" onclick="loadContent('pagina_gerenciar_equipe.php')">
                        <i class="lni lni-users"></i>
                        <span>Gerenciar Equipe</span>
                    </a>
                </li>
                <li class="sidebar-item"> <!-- Novo item de submenu -->
                    <a href="#" class="sidebar-link" onclick="loadContent('pagina_minha_equipe.php')">
                        <i class="lni lni-users"></i>
                        <span>Minha Equipe</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a onclick="redirecionar()" id="home" class="sidebar-link">
                    <i class="lni lni-home"></i>
                    <span>Home</span>
                </a>
                <a type="submit" id="sair" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <?php echo $email_login; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded"></div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">
                <div id="main-content" class="container-fluid">
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
    <script src="pagina_colaborador.js"></script>
</body>

</html>
