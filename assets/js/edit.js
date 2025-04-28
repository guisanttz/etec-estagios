const btnVoltar = document.getElementById("btn-fecha-modal");
const tabelaURL = new URLSearchParams(window.location.search);

btnVoltar.onclick = () => {
    if (tabelaURL.get('tabela') === 'usuarios') {
        window.location.href = "painel-usuarios.php";
    } else if (tabelaURL.get('tabela') === 'administradores') {
        window.location.href = "painel-administradores.php";
    } else if (tabelaURL.get('tabela') === 'empresas') {
        window.location.href = "painel-empresas.php";
    } else if (tabelaURL.get('tabela') === 'vagas') {
        window.location.href = "painel-vagas.php";
    } else if (tabelaURL.get('tabela') === 'contratos') {
        window.location.href = "painel-contratos.php";
    }
}