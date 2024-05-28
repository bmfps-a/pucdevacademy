const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});

function redirecionar() {
  window.location.href = '../homepage/index.php';
}

function redirecionarEditarPerfil() {
  window.location.href = '../editar_perfil/editar_perfil.php';
}

document.getElementById('sair').addEventListener('click', redirecionar);
document.getElementById('editarPerfil').addEventListener('click', redirecionar);


document.getElementById('editarPerfil').addEventListener('click', function(e) {
    e.preventDefault(); // Impede o comportamento padrão do link
    redirecionarEditarPerfil(); // Redireciona imediatamente para a página de edição de perfil
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

function searchContent() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const content = document.getElementById('content');
    if (!input) {
        content.style.display = "";
        return;
    }
    content.style.display = content.innerHTML.toLowerCase().includes(input) ? "" : "none";
}
