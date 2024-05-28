const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});
function enviar() {
  var nomeProjeto = document.getElementById('nomeProjeto');
  var descProjeto = document.getElementById('descProjeto');
  var dataInicio = document.getElementById('dataInicio');
  var dataFim = document.getElementById('dataFim');
  
  if (nomeProjeto.value.trim() == "") {
      alert("Por favor, preencha o nome do projeto.");
      nomeProjeto.focus();
      return false;
  }
  if (descProjeto.value.trim() == "") {
      alert("Por favor, preencha a descrição do projeto.");
      descProjeto.focus();
      return false;
  }
  if (dataInicio.value.trim() == "") {
      alert("Por favor, selecione a data de início do projeto.");
      dataInicio.focus();
      return false;
  }
  if (dataFim.value.trim() == "") {
      alert("Por favor, selecione a data de término do projeto.");
      dataFim.focus();
      return false;
  }
  return true;
}
