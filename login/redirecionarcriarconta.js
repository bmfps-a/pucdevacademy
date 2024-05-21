function redirecionar() {
    if (document.getElementById('empresa').checked) {
        window.location.href = '../cadastro/cadastro-empresa.php';
    } else {
        window.location.href = '../cadastro/cadastro-colaborador.php';
    }
}

document.getElementById('criarConta').addEventListener('click', redirecionar);
