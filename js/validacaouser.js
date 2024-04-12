let camposValidos = false;
function validar(campoId) {
    let campo = document.getElementById(campoId);
    let mensagem = document.getElementById("mensagem-"  + campoId);
    if (!campo.checkValidity()) {
        mensagem.textContent = "Dados inválidos!";
        return false;
    } else {
        mensagem.textContent = "";
        return true;
    }
}

function enviar() {
    let senha = document.getElementById("senha").value
    let confirmarSenha = document.getElementById("confirmarSenha").value
    let MensagemConfirmarSenha = document.getElementById("mensagem-confirmarSenha")
    if (confirmarSenha=== senha){
        MensagemConfirmarSenha.textContent = ""
        camposValidos = true;
    }
    else{
        MensagemConfirmarSenha.textContent = "Senhas não iguais!"
        camposValidos = false
    }
    let campos = ["nome", "cpf", "tel", "email", "senha"];
        
    campos.forEach(function(campo) {
        if (!validar(campo)) {
            camposValidos = false;
        }
    });
    if (camposValidos === true) {
        alert("Formulário enviado com sucesso!");
        console.log("Valores: ")
        console.log(document.getElementById("nome").value)
        console.log(document.getElementById("cpf").value)
        console.log(document.getElementById("ra").value)
        console.log(document.getElementById("tel").value)
        console.log(document.getElementById("email").value)
        console.log(document.getElementById("senha").value)
        console.log(document.getElementById("confirmarSenha").value)
        let form = document.getElementById("registro")
        form.submit
    }
}

$(document).ready(function() {
    $('#nome').inputmask({
        regex: "[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*",
        greedy: false
    });
    $('#cpf').inputmask('999.999.999-99');
    $('#ra').inputmask('99999999');
    $('#tel').inputmask('(99) 99999-9999');   
});
