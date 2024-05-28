<?php
session_start();
include("../conexaobd/conexao.php");

// Verifique se o usuário está logado
if (!isset($_SESSION['emailcolaborador'])) {
    header("Location: ../login/login.php");
    exit();
}

// Consulta SQL para selecionar todas as empresas
$sql = "SELECT * FROM Empresa";
$result = mysqli_query($conn, $sql);

// Verifique se a consulta foi bem-sucedida
if (!$result) {
    die("Erro na consulta: " . mysqli_error($conn));
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="./pagina_colaborador.css">
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
                    <i class="lni lni-user"></i>
                    <span>Perfil</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                   data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="lni lni-protection"></i>
                    <span>Alunos</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Registro de empresas</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Registro de alunos</a>
                    </li>
                </ul>
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
                        </a>
                        <div class="dropdown-menu dropdown-menu-end rounded">
                            <!-- Dropdown items here -->
                        </div>
                    </li>
                </ul>
                <span class="navbar-text">
                    <?php echo $_SESSION['emailcolaborador']; ?>
                </span>
            </div>
        </nav>
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <?php if (isset($_GET['cnpj'])): ?>
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">Projetos em andamento</h3>
                        <div class="row">
                            <div class="col-12 col-md-4 ">
                                <div class="card border-0">
                                    <div class="card-body py-4">
                                        <h5 class="mb-2 fw-bold">Projeto X</h5>
                                        <p class="mb-2 fw-bold">Realizar sistema MVC</p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">90.0% para concluir</span>
                                            <span class="fw-bold">atualizado: 30 min</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <h3 class="fw-bold fs-4 my-3">Empresas relacionadas</h3>
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr class="highlight">
                                    <th scope="col">CNPJ</th>
                                    <th scope="col">Nome Empresa</th>
                                    <th scope="col">Nome Fantasia</th>
                                    <th scope="col">Ramo Empresarial</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row["cnpj"] . "</td>";
                                        echo "<td>" . $row["nome_empresa"] . "</td>";
                                        echo "<td>" . $row["nome_fantasia"] . "</td>";
                                        echo "<td>" . $row["ramo_empresarial"] . "</td>";
                                        echo "<td>" . $row["telefone"] . "</td>";
                                        echo "<td>
                                                <a href='edit_empresa.php?cnpj=" . $row["cnpj"] . "' class='btn btn-sm edit-btn'>Editar</a>
                                                <a href='delete_empresa.php?cnpj=" . $row["cnpj"] . "' class='btn btn-sm delete-btn ml-1' onclick=\"return confirm('Tem certeza que deseja excluir esta empresa?')\">Deletar</a>
                                                <a href='pagina_professor.php?cnpj=" . $row["cnpj"] . "' class='btn btn-sm edit-btn'>Ver projetos</a>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>Não há empresas cadastradas ainda!</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-body-secondary">
                    <div class="col-6 text-start">
                        <a class="text-body-secondary" href="#">
                            <strong>PUC Dev Academy</strong>
                        </a>
                    </div>
                    <div class="col-6 text-end text-body-secondary d-none d-md-block">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="text-body-secondary" href="#">Contato</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body-secondary" href="#">Sobre nós</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="./pagina_professor.js"></script>
</body>
</html>
