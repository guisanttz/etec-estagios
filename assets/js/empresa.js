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