const statusURL = new URLSearchParams(window.location.search);
if (statusURL.get("status") === "editsucesso") {
  Swal.fire({
    title: "Editado!",
    text: "Seus dados foram editados com sucesso.",
    icon: "success",
  }).then(() => {
    window.location.href = 'perfilUsuario.php';
  });
} /* else if (statusURL.get("status") === "editerro") {
  Swal.fire({
    title: "Erro ao editar!",
    text: "Ocorreu um erro ao editar seus dados. Tente novamente.",
    icon: "error",
  });
} */
