<?php
session_start();
include("../conexaobd/conexao.php");
$buttonText = "Login/Cadastro";
$buttonLink = "../login/login.php";

if (isset($_SESSION['emailcolaborador']) || isset($_SESSION['emailempresa']) || isset($_SESSION['emailaluno']) || isset($_SESSION['emailadmin'])) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 10)) {
        session_unset();
        session_destroy();
        header("Location: ../homepage/index.php");
        exit();
    }

    $_SESSION['LAST_ACTIVITY'] = time();
}

if (isset($_SESSION['emailcolaborador'])) {
    $loggedInEmail = $_SESSION['emailcolaborador'];
    $buttonText = "Dashboard";
    $buttonLink = "../pagina-colaborador/pagina_colaborador.php";
} elseif (isset($_SESSION['emailempresa'])) {
    $loggedInEmail = $_SESSION['emailempresa'];
    $buttonText = "CriarProjetos";
    $buttonLink = "../pagina-empresa/empresa_page.php";
} elseif (isset($_SESSION['emailaluno'])) {
    $loggedInEmail = $_SESSION['emailaluno'];
    $buttonText = "Projeto";
    $buttonLink = "../pagina-aluno/aluno_page.php";
} elseif (isset($_SESSION['emailadmin'])) {
    $loggedInEmail = $_SESSION['emailadmin'];
    $buttonText = "AdminCenter";
    $buttonLink = "../admin-page/admin_page.php";
} else {
    $loggedInEmail = "";
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: ../homepage/index.php");
    exit();
}
?>

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
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS DO PROJETO -->
    <link rel="stylesheet" href="style.css">
    <!-- JavaScript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>PucDevAcademy</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container py-3"> 
        <!-- Exibe o email da pessoa logada -->
            <?php if (!empty($loggedInEmail)) : ?>
            <a href="../editar_perfil/editar_perfil.php"><span class="navbar-text me-3" style="color:white"><?php echo "Logado como: " . $loggedInEmail; ?></span></a>
            <?php endif; ?>
            <!-- Botão de logoff -->
            <?php if (isset($_SESSION['emailcolaborador']) || isset($_SESSION['emailempresa']) || isset($_SESSION['emailaluno']) || isset($_SESSION['emailadmin'])) : ?>
                <form method="POST" class="d-inline">
                    <button class="btn btn-danger me-3" type="submit" name="logout">Logout</button>
                </form>
            <?php endif; ?>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items"
                aria-controls="navbar-items" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar-items">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-scroll" aria-current="page" href="#"><i class="bi bi-house"></i>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-scroll" href="#about"><i class="bi bi-code-square"></i> Sobre nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-scroll" href="#contact"><i class="bi bi-telephone"></i> Contato</a>
                    </li>
                </ul>
                <a class="btn-login" href="<?php echo $buttonLink; ?>" role="button"><?php echo $buttonText; ?></a>
            </div>
        </div>
    </nav>
    <!-- Corpo e Logo -->
    <section class="showroom">
        <div class="container" id="content">
            <img src="../imagens/LOGO2.png" alt="Logo" class="logo">
        </div>
        <div class="wellcome-body">
            <img src="../imagens/PC_ep.png" alt="pc" class="pc-img">
            <p><span class="cor-verde">Conectando</span> o talento <span class="cor-roxa">acadêmico</span> às <br>
                oportunidades do<span class="cor-roxa"> mercado de trabalho.</span></p>
        </div>
    </section>

    <!-- Sobre Nós -->
    <section class="about-us" id="about">
        <h2>Sobre Nós</h2>
        <div class="container">
            <div class="text">
                <p>Na PUCPR, o projeto "PucDevAcademy" capacita alunos a
                    desenvolverem softwares gratuitos para empresas e ONGs carentes
                    de recursos. Sob supervisão docente, os estudantes aplicam
                    conhecimentos teóricos em projetos reais, ganhando habilidades
                    técnicas e de gestão. Além de enriquecer seus currículos, contribuem
                    para o bem-estar social ao fornecerem soluções tecnológicas que
                    melhoram operações e impactam positivamente a comunidade.
                    Essa iniciativa promove a responsabilidade social da universidade,
                    fortalece laços comunitários e inspira uma abordagem de
                    aprendizado prático e solidário.</p>
            </div>
            <img src="../imagens/campus.jpg" alt="campus" class="campus-img" width="405" height="270">
        </div>
    </section>

    <!-- Footer -->
    <footer class="container-fluid" id="contact">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img class="logoPuc" src="../imagens/logo_pucpr_horizontal_monocromatico.png" alt="logoPUCPR">
            </div>
            <div class="col-md-4 text-center">
                <div class="texto_informacoes">
                    <h5>Telefone:<br>(41) 99277-2012</h5>
                    <h5>E-mail: <br>hotmilk.curitiba@pucpr.br</h5>
                    <h5>Endereço:<br>Rua Imaculada Conceição, 1430 • Prado Velho</h5>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="mapa-hotmilk">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3602.5356043580546!2d-49.25556108818815!3d-25.45378497745296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dce4f07e4d346b%3A0x280bed912bc03c41!2sHOTMILK!5e0!3m2!1spt-BR!2sbr!4v1710177584363!5m2!1spt-BR!2sbr"
                        width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer