function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('profilePreview');
    const reader = new FileReader();

    reader.onload = function() {
        preview.src = reader.result;
    }

    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('profilePicture').addEventListener('change', previewImage);

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
    let senhaAntiga = document.getElementById("senhaAntiga").value
    let senha = document.getElementById("senha").value
    let confirmarSenha = document.getElementById("confirmarSenha").value
    let MensagemConfirmarSenha = document.getElementById("mensagem-confirmarSenha")
    
    if (senha === senhaAntiga) {
        MensagemConfirmarSenha.textContent = "Senha nova igual à anterior"
        camposValidos = false;
    } else if (confirmarSenha !== senha) {
        MensagemConfirmarSenha.textContent = "Senhas não iguais!"
        camposValidos = false;
    } else {
        MensagemConfirmarSenha.textContent = ""
        camposValidos = true;
    }
    
    if (camposValidos === true) {
        console.log("Valores: ")
        console.log(document.getElementById("nome").value)
        console.log(document.getElementById("cpf").value)
        console.log(document.getElementById("ra").value)
        console.log(document.getElementById("tel").value)
        console.log(document.getElementById("email").value)
        console.log(document.getElementById("senha").value)
        console.log(document.getElementById("confirmarSenha").value)
        return true
    }
    return false
}
