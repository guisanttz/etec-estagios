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

// cria variaveis para os elementos da pagina
let arquivoLogo = document.getElementById("file-logo");
let nomeArquivoLogo = document.getElementById("file-name-logo");
let arquivoArt = document.getElementById("file-art");
let nomeArquivoArt = document.getElementById("file-name-art");

// cria lista de eventos e utiliza o evento change
arquivoLogo.addEventListener("change", function () {
  // cria variavel pro nome do arquuivo
  let nomeArquivo;
  // verifica se tem  algum arquivo selecionado
  if (arquivoLogo.files.length > 0) {
    // define nomeArquivo como o nome do arquivo selecionado
    nomeArquivo = arquivoLogo.files[0].name;
  } else {
    //  se não tiver arquivo selecionado, define nomeArquivo como vazio

    nomeArquivo = "Nenhum arquivo selecionado";
  }
  // altera o conteudo do texto para o nome do arquivo selecionado
  nomeArquivoLogo.textContent = nomeArquivo;
});

// msm coisa do codigo de cima
arquivoArt.addEventListener("change", function () {
  let nomeArquivo;
  if (arquivoArt.files.length > 0) {
    nomeArquivo = arquivoArt.files[0].name;
  } else {
    nomeArquivo = "Nenhum arquivo selecionado";
  }
  nomeArquivoArt.textContent = nomeArquivo;
});

const remuneracao = document.querySelector('select[name="remunerado"]');
const valor = document.querySelector('input[name="valor"]');

remuneracao.addEventListener("change", function () {
  if (remuneracao.value === "Não") {
    valor.disabled = true;
    valor.value = "";
  } else {
    valor.disabled = false;
  }
});

let pesquisa = document.getElementById("pesquisa");

function pesquisarVaga() {
  window.location = "painel-vagas.php?pesquisa=" + pesquisa.value;
}

const statusURL = new URLSearchParams(window.location.search);
if (statusURL.get("status") === "delsucesso") {
  Swal.fire({
    title: "Deletado!",
    text: "Esse registro foi deletado com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'painel-vagas.php';
  });
} else if (statusURL.get("status") === "editsucesso") {
  Swal.fire({
    title: "Editado!",
    text: "A vaga foi editada com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'painel-vagas.php';
  });
} else if (statusURL.get("status") === "cadsucesso") {
  Swal.fire({
    title: "Cadastrado!",
    text: "A vaga foi cadastrada com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'painel-vagas.php';
  });
} else if (statusURL.get("status") === "caderro") {
  Swal.fire({
    title: "Erro!",
    text: "Ocorreu um erro ao cadastrar a vaga. Tente novamente.",
    icon: "error",
  }).then(() => {
    window.location.href = 'painel-vagas.php';
  });
}