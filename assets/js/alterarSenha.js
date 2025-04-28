const senha = document.querySelector('#senha');
const confirmaSenha = document.querySelector('#confirma-senha');

function validarSenha() {

    if (senha.value !== confirmaSenha.value) {
        confirmaSenha.setCustomValidity("As senhas não coincidem");
        confirmaSenha.reportValidity();
        return false;
    } else {
        confirmaSenha.setCustomValidity("");
        return true;
    }
    
}

confirmaSenha.addEventListener('input', validarSenha);