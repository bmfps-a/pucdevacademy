function redirecionar() {
    if (document.getElementById('empresa').checked) 
    {
        window.location.href = '../cadastro/cadastro-empresa.php';
    } 
    else if (document.getElementById('aluno').checked) {
        
        window.location.href = '../cadastro/cadastro-aluno.php';
    }
    else 
    {
        window.location.href = '../cadastro/cadastro-colaborador.php';
    }
}

document.getElementById('criarConta').addEventListener('click', redirecionar);
