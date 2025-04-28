const btnVoltar = document.getElementById("btn-voltar");

btnVoltar.addEventListener("click", () => {
  window.location.href = "minhasVagas.php";
});

const btnDeletar = document.getElementById("deletar");

btnDeletar.addEventListener("click", () => {
  Swal.fire({
    title: "Você tem certeza que deseja deletar essa vaga?",
    text: "Essa ação não poderá ser desfeita!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sim, excluir",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    let id = this.getAttribute("idRegistro");
    if (result.isConfirmed) {
      Swal.fire({
        title: "Deletado!",
        text: "Essa vaga foi deletada com sucesso.",
        icon: "success",
      }).then(() => {
        window.location.href = `deleteVaga.php?id=${id}`;
      });
    }
  });
});