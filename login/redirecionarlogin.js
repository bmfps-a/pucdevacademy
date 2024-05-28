document.querySelectorAll('input[name="tipo"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        let formulario = document.getElementById('loginform');
        if (this.id === 'empresa') {
            formulario.action = 'login-empresa-bd.php';
        } else if(this.id === 'colaborador') {
            formulario.action = 'login-colaborador-bd.php';
        } else {
            formulario.action = 'login-aluno-bd.php';
        }
    });
});