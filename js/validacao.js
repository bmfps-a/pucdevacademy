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
    let campos = ["nomeEmpresa", "cnpj", "nomeRepresentante", "nomeFic", "ramo", "cpf", "cargo", "tel", "email", "senha",];
        
    campos.forEach(function(campo) {
        if (!validar(campo)) {
            camposValidos = false;
        }
    });
    if (camposValidos === true) {
        alert("Formulário enviado com sucesso!");
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
        let form = document.getElementById("registro")
        form.submit
    }
}

$(document).ready(function() {
    $('#cnpj').inputmask('99.999.999/0009-99');
    $('#nomeRepresentante').inputmask({
        regex: "[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*",
        greedy: false
    });
    $('#nomeFic').inputmask({
        regex: "[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*",
        greedy: false
    });
    $('#ramo').inputmask({
        regex: "[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*",
        greedy: false
    });
    $('#cpf').inputmask('999.999.999-99');
        
    $('#cargo').inputmask({
        regex: "[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*",
        greedy: false
    });
    $('#tel').inputmask('(99) 99999-9999');   
});
