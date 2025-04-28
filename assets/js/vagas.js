let pesquisa = document.getElementById("pesquisa");

function pesquisarVaga() {
  window.location = 'vagas.php?pesquisa=' + pesquisa.value;
}