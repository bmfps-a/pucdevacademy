<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Administrador</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                        <!-- Navbar content unchanged -->
                    </ul>
                </div>
            </nav>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="/account.png" class="avatar img-fluid" alt="">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pF3WhENqqXJlSS7XebYpZ30clWs0U7S/J5nTrWplzOHny/jI/03F5I6sjmQJ5iBA" crossorigin="anonymous">
    </script>
    <script src="./admin_page.js"></script>
    
</body>

</html>
