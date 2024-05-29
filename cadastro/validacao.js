let camposValidos = false;
function validar(campoId) {
    let campo = document.getElementById(campoId);
    let mensagem = document.getElementById("mensagem-"  + campoId);
    if (!campo.checkValidity()) {
        mensagem.textContent = "Dados inválidos!";
        campo.classList.add("error")
        return false;
    } else {
        mensagem.textContent = "";
        campo.classList.remove("error")
        return true;
    }
}

function enviar() {
    let senha = document.getElementById("senha").value
    let confirmarSenha = document.getElementById("confirmarSenha").value
    let MensagemConfirmarSenha = document.getElementById("mensagem-confirmarSenha")
    let campos = ["nomeEmpresa", "cnpj", "nomeRepresentante", "nomeFic", "ramo", "cpf", "cargo", "tel", "email", "senha",];
        
    campos.forEach(function(campo) {
        if (!validar(campo)) {
            camposValidos = false;
        }
    });
    if (confirmarSenha=== senha){
        MensagemConfirmarSenha.textContent = ""
        camposValidos = true;
    }
    else{
        MensagemConfirmarSenha.textContent = "Senhas não iguais!"
        camposValidos = false
    }
    if (camposValidos === true) {
        console.log("Valores: ")
        console.log(document.getElementById("nomeEmpresa").value)
        console.log(document.getElementById("cnpj").value)
        console.log(document.getElementById("nomeRepresentante").value)
        console.log(document.getElementById("nomeFic").value)
        console.log(document.getElementById("ramo").value)
        console.log(document.getElementById("cpf").value)
        console.log(document.getElementById("cargo").value)
        console.log(document.getElementById("tel").value)
        console.log(document.getElementById("email").value)
        console.log(document.getElementById("senha").value)
        console.log(document.getElementById("confirmarSenha").value)
        return true
    }
    return false
}

$(document).ready(function() {
    $('#cnpj').inputmask('99.999.999/0009-99');
    $('#nomeRepresentante').inputmask({
        regex: "[A-Za-zÀ-ÖØ-öø-ÿçÇ ]*",
        greedy: false
    });
    $('#nomeFic').inputmask({
        regex: "[A-Za-zÀ-ÖØ-öø-ÿçÇ ]*",
        greedy: false
    });
    $('#ramo').inputmask({
        regex: "[A-Za-zÀ-ÖØ-öø-ÿçÇ ]*",
        greedy: false
    });
    $('#cpf').inputmask('999.999.999-99');
        
    $('#cargo').inputmask({
        regex: "[A-Za-zÀ-ÖØ-öø-ÿçÇ ]*",
        greedy: false
    });
    $('#tel').inputmask('(99) 99999-9999');   
});