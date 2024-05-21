let camposvalidos = false;
function validar(campoid) {
  let campo = document.getElementById(campoid);
  if (!campo.checkValidity()) {
    return false;
  } else {
    return true;
  }
}

function enviar() {
  let campos = ["email", "password"];
  camposvalidos = true;
  campos.forEach(function (campo) {
    if (!validar(campo)) {
      camposvalidos = false;
    }
  });
  if (camposvalidos === true) {
    console.log(document.getElementById("email").value);
    console.log(document.getElementById("password").value);
  }
  window.location.href = "../editar_perfil/editar_perfil.php";
}
