document.addEventListener("DOMContentLoaded", function () {
  const btnAbreModal = document.getElementById("btn-modal-cadastro");
  const btnFechaModal = document.getElementById("btn-fecha-modal");
  const modal = document.getElementById("modal-cadastro");
  btnAbreModal.addEventListener("click", function () {
    modal.showModal();
  });
  btnFechaModal.addEventListener("click", function () {
    modal.close();
  });
});

let pesquisa = document.getElementById("pesquisa");

function pesquisarAdministrador() {
  window.location = "painel-administradores.php?pesquisa=" + pesquisa.value;
}

// Seleciona todos os botões de deletar
const btnsDeletar = document.querySelectorAll(".deletar");

// Adiciona clique para cada botão
btnsDeletar.forEach((btn) => {
  btn.addEventListener("click", () => {
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
        const id = btn.getAttribute("data-id");
        window.location.href = `delete.php?tabela=administradores&id=${id}`;
      }
    });
  });
});

const statusURL = new URLSearchParams(window.location.search);
if (statusURL.get("status") === "delsucesso") {
  Swal.fire({
    title: "Deletado!",
    text: "Esse registro foi deletado com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'painel-administradores.php';
  });
} else if (statusURL.get("status") === "cadsucesso") {
  Swal.fire({
    title: "Cadastrado!",
    text: "O administrador foi cadastrado com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'painel-administradores.php';
  });
} else if (statusURL.get("status") === "editsucesso") {
  Swal.fire({
    title: "Editado!",
    text: "O administrador foi editado com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'painel-administradores.php';
  });
} else if (statusURL.get("status") === "cadexiste") {
  Swal.fire({
    title: "Atenção!",
    text: "Já existe um administrador com esse usuário e/ou senha.",
    icon: "warning",
  }).then(() => {
    window.location.href = 'painel-administradores.php';
  });
} else if (statusURL.get("status") === "caderro") {
  Swal.fire({
    title: "Erro!",
    text: "Ocorreu um erro ao cadastrar o administrador. Tente novamente.",
    icon: "error",
  }).then(() => {
    window.location.href = 'painel-administradores.php';
  });
}
