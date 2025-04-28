const statusURL = new URLSearchParams(window.location.search);

if (statusURL.get('status') === 'delsucesso') {
  Swal.fire({
    title: "Deletada!",
    text: "Essa vaga foi deletada com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'minhasVagas.php'; // Redireciona para a página sem o parâmetro
  });
} else if (statusURL.get('status') === 'editsucesso') {
  Swal.fire({
    title: "Editado!",
    text: "A vaga foi editada com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'minhasVagas.php';
  });
} else if (statusURL.get('status') === 'cadsucesso') {
  Swal.fire({
    title: "Cadastrada!",
    text: "A vaga foi cadastrada com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'minhasVagas.php';
  });
} else if (statusURL.get('status') === 'caderro') {
  Swal.fire({
    title: "Erro ao cadastrar!",
    text: "Ocorreu um erro ao cadastrar a vaga. Tente novamente.",
    icon: "error",
  }).then(() => {
    window.location.href = 'minhasVagas.php';
  });
}
