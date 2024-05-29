const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.sidebar-link[data-target]').forEach(function (link) {
      link.addEventListener('click', function (e) {
          e.preventDefault();
          var target = this.getAttribute('data-target');
          window.location.href = target;
      });
  });

  document.getElementById('sair').addEventListener('click', function () {
      window.location.href = '../logout/logout.php';
  });
});

function redirecionar() {
  window.location.href = "../homepage/index.php";
}

function redirecionarEditarPerfilColaborador() {
  window.location.href = "../editar_perfil/editar_perfil.php";
}

function loadContent(url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById('main-content').innerHTML = data;
        })
        .catch(error => console.error('Error loading content:', error));
}

