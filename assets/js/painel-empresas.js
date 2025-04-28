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

function pesquisarEmpresa() {
  window.location = "painel-empresas.php?pesquisa=" + pesquisa.value;
}

const statusURL = new URLSearchParams(window.location.search);
if (statusURL.get("status") === "delsucesso") {
  Swal.fire({
    title: "Deletado!",
    text: "Esse registro foi deletado com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'painel-empresas.php';
  });
} else if (statusURL.get("status") === "cadsucesso") {
  Swal.fire({
    title: "Cadastrado!",
    text: "A empresa foi cadastrada com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'painel-empresas.php';
  });
} else if (statusURL.get("status") === "editsucesso") {
  Swal.fire({
    title: "Editado!",
    text: "A empresa foi editada com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'painel-empresas.php';
  });
} else if (statusURL.get("status") === "senhaexiste") {
    Swal.fire({
        title: "Atenção!",
        text: "A senha inserida já existe.",
        icon: "warning",
    }).then(() => {
      window.location.href = 'painel-empresas.php';
    });
} else if (statusURL.get("status") === "cadexiste") {
    Swal.fire({
        title: "Atenção!",
        text: "CNPJ, e-mail ou telefone inseridos já existem.",
        icon: "warning",
    }).then(() => {
      window.location.href = 'painel-empresas.php';
    });
} else if (statusURL.get("status") === "caderro") {
    Swal.fire({
        title: "Erro!",
        text: "Ocorreu um erro ao cadastrar a empresa. Tente novamente",
        icon: "error",
    }).then(() => {
      window.location.href = 'painel-empresas.php';
    });
}