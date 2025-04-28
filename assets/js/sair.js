const btnSair = document.getElementById("sair");
const tipo = document.getElementById("tipo").value;

btnSair.addEventListener("click", () => {
  Swal.fire({
    title: "Tem certeza que deseja sair?",
    text: "Você precisará fazer login novamente para acessar o sistema.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sim, sair",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      if (tipo === "usuario") {
        window.location.href = "saindo.php?tipo=usuario";
      } else if (tipo === "empresa") {
        window.location.href = "saindo.php?tipo=empresa";
      } else if (tipo === "administrador") {
        window.location.href = "saindo.php?tipo=administrador";
      }
    }
  });
});
