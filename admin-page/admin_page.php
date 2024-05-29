<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_SESSION['emailcolaborador'])) {
    $email_login = $_SESSION['emailcolaborador'];

    // Verifique se a conexão foi estabelecida com sucesso
    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "SELECT cpf, nome, ra, email, telefone, foto_colaborador FROM colaborador_puc WHERE email=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('s', $email_login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row["email"];
            $fotoColaborador = $row["foto_colaborador"];
        } else {
            echo "Usuário não encontrado.";
            exit();
        }
    } else {
        // Exibir erro específico da preparação da consulta
        echo "Erro na preparação da consulta SQL: " . $conn->error;
        exit();
    }
} else {
    header("Location: ../login/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Administrador</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./admin_page.css">
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
                    <a class="sidebar-link" id="editarPerfil" onclick="redirecionarEditarPerfil()">
                        <i class="lni lni-pencil"></i>
                        <span>Editar Perfil</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-target="alunos.php" data-category="Alunos">
                        <i class="lni lni-user"></i>
                        <span>Alunos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-target="empresas.php" data-category="Empresas">
                        <i class="lni lni-agenda"></i>
                        <span>Empresas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-target="projetos.php" data-category="Projetos">
                        <i class="lni lni-protection"></i>
                        <span>Projetos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" data-target="colaboradores.php" data-category="Colaboradores">
                        <i class="lni lni-users"></i>
                        <span>Colaboradores</span>
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
                <form class="d-none d-sm-inline-block" onsubmit="return false;">
                    <div class="input-group input-group-navbar">
                        <input type="text" id="searchInput" class="form-control border-0 rounder-0" placeholder="Pesquisar..." oninput="searchContent()">
                        <button class="btn border-0 rounder-0" type="button" onclick="searchContent()">
                            Pesquisar
                        </button>
                    </div>
                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <?php echo "<img src='data:image/jpeg;base64," . base64_encode($row['foto_colaborador']) . "' class='avatar img-fluid' alt=''>"; ?>
                                <?php echo $email_login; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded"></div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                            <img src="" class="avatar img-fluid" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end rounded">
                        </div>
                    </li>
                </ul>
            </div>
            </nav>
            <main class="content px-3 py-4" id="content">
                <!-- Conteúdo dinâmico será carregado aqui -->
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-body-secondary">
                        <div class="col-6 text-start ">
                            <a class="text-body-secondary" href=" #">
                                <strong>PUC Dev Academy</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="./admin_page.js" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zO0RSMMkUJwS4rFMz3TZWHUAQ+GTkd5obAbycQ3iAgd7av5bgcYJYKEQWSGAirDy" crossorigin="anonymous">
    </script>

</body>

</html>