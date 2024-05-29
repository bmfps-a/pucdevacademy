const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});

function redirecionar() {
  window.location.href = '../homepage/index.php';
}

function redirecionarEditarPerfilAluno() {
  window.location.href = '../editar_perfil/editar_perfil_aluno.php';
}

document.getElementById('home').addEventListener('click', redirecionar);

document.getElementById('editar-perfil-aluno').addEventListener('click', function(e) {
    e.preventDefault(); // Impede o comportamento padrão do link
    redirecionarEditarPerfilAluno(); // Redireciona imediatamente para a página de edição de perfil
});

document.querySelectorAll('.sidebar-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const target = this.getAttribute('data-target');
        const category = this.getAttribute('data-category');
        if (target && category) {
            fetch(target)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('content').innerHTML = `<h2>${category}</h2>` + data;
                });
        }
    });
});
