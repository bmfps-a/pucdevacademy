

function validar(campoId) {
    let campo = document.getElementById(campoId);
    let mensagem = document.getElementById("mensagem-" + campoId);
    if (!campo.checkValidity()) {
        mensagem.textContent = "Dados inválidos!";
        campo.classList.add("error");
        return false;
    } else {
        mensagem.textContent = "";
        campo.classList.remove("error");
        return true;
    }
}

function validarCampos() {
    let campos = ["cnpj", "nome_empresa", "nome_fantasia", "ramo_empresarial", "tel"];
    let camposValidos = true;

    campos.forEach(campoId => {
        if (!validar(campoId)) {
            camposValidos = false;
        }
    });

    let senhaAntiga = document.getElementById("senhaAntiga").value;
    let senha = document.getElementById("senha").value;
    let confirmarSenha = document.getElementById("confirmarSenha").value;
    let MensagemConfirmarSenha = document.getElementById("mensagem-confirmarSenha");

    if (senha && senha === senhaAntiga) {
        MensagemConfirmarSenha.textContent = "Senha nova igual à anterior";
        camposValidos = false;
    } else if (senha && confirmarSenha !== senha) {
        MensagemConfirmarSenha.textContent = "Senhas não iguais!";
        camposValidos = false;
    } else {
        MensagemConfirmarSenha.textContent = "";
    }

    return camposValidos;
}

document.getElementById('editar').addEventListener('submit', function(event) {
    if (!validarCampos()) {
        event.preventDefault();
    }
});

document.getElementById('nome_empresarial').addEventListener('input', function() { validar('nome_empresarial'); });
document.getElementById('cnpj').addEventListener('input', function() { validar('cnpj'); });
document.getElementById('nome_fantasia').addEventListener('input', function() { validar('nome_fantasia'); });
document.getElementById('tel').addEventListener('input', function() { validar('tel'); });
document.getElementById('senha').addEventListener('input', function() { validar('senha'); });
document.getElementById('confirmarSenha').addEventListener('input', function() { validar('confirmarSenha'); });

$(document).ready(function (){
    $('#nome').inputmask({
        regex: "[A-Za-zÀ-ÖØ-öø-ÿçÇ ]*",
        greedy: false
    });
    $('#cpf').inputmask('999.999.999-99');
    $('#ra').inputmask('99999999');
    $('#tel').inputmask('(99) 99999-9999');   
});

