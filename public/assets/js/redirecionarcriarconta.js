function redirecionar() {
    if (document.getElementById('empresa').checked) {
        window.location.href = '/cadastro/cadastro.html';
    } else {
        window.location.href = '/cadastro/cadastro-usuario.html';
    }
}
document.getElementById('redirecionar').addEventListener('click', redirecionar);   