const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});
document.querySelectorAll('.sidebar-link').forEach(link => {
  link.addEventListener('click', function (e) {
      e.preventDefault();
      const target = this.getAttribute('data-target');
      const category = this.getAttribute('data-category');
      fetch(target)
          .then(response => response.text())
          .then(data => {
              document.getElementById('content').innerHTML = `<h2>${category}</h2>` + data;
          });
  });
});
function redirecionar() {
  window.location.href = '../homepage/index.php';
}
document.getElementById('sair').addEventListener('click', redirecionar);