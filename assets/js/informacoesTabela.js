const btnVoltar = document.getElementById("btn-voltar");
const tabelaURL = new URLSearchParams(window.location.search);

btnVoltar.onclick = () => {
  if (tabelaURL.get("tabela") === "usuarios") {
    window.location.href = "painel-usuarios.php";
  } else if (tabelaURL.get("tabela") === "empresas") {
    window.location.href = "painel-empresas.php";
  } else if (tabelaURL.get("tabela") === "vagas") {
    window.location.href = "painel-vagas.php";
  } else if (tabelaURL.get("tabela") === "contratos") {
    window.location.href = "painel-contratos.php";
  }
};

const btnDeletar = document.getElementById("deletar");

btnDeletar.addEventListener("click", function () {
  Swal.fire({
    title: "Você tem certeza que deseja deletar esse registro?",
    text: "Essa ação não poderá ser desfeita!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sim, excluir",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      let tabela = this.getAttribute("tipoTabela");
      let id = this.getAttribute("idRegistro");
      window.location.href = `delete.php?tabela=${tabela}&id=${id}`;
    }
  });
});
