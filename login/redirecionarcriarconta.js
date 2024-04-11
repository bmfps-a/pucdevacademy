function redirecionar() {
    if (document.getElementById('empresa').checked) {
        window.location.href = '../cadastro/cadastro.php';
    } else {
        window.location.href = '../cadastro/cadastro-usuario.php';
    }
}

document.getElementById('criarConta').addEventListener('click', redirecionar);
