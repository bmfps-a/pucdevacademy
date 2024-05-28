document.getElementById('foto').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profilePreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});


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
    let campos = ["nome", "cpf", "ra", "email", "tel"];
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

document.getElementById('nome').addEventListener('input', function() { validar('nome'); });
document.getElementById('cpf').addEventListener('input', function() { validar('cpf'); });
document.getElementById('ra').addEventListener('input', function() { validar('ra'); });
document.getElementById('email').addEventListener('input', function() { validar('email'); });
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


document.getElementById('foto').addEventListener('change', function() {
    const fileInput = this;
    const filePath = fileInput.value;
    const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(filePath)) {
        alert('Por favor, selecione um arquivo JPG ou PNG.');
        fileInput.value = ''; // Limpa o campo de entrada de arquivo
        return false;
    } else {
        // Opcional: se você quiser fazer algo com o arquivo selecionado, você pode fazer isso aqui
        console.log('Arquivo válido selecionado:', fileInput.files[0]);
    }
});