/* const btnSair = document.getElementById("sair");

btnSair.onclick = () => {
  let resposta = confirm("Tem certeza que deseja sair?");
  if (resposta == true) {
    window.location.href = "saindo.php?tipo=administrador";
  }
}; */

const btnSair = document.getElementById("sair");

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
      window.location.href = "saindo.php?tipo=administrador";
    }
  });
});
