function validarCNPJ() {
    const cnpj = document.querySelector("#cnpj").value;
  if (cnpj.length < 14 || cnpj.length > 15) {
    window.location.href = "cnpjvalida.php?status=erro";
    return false;
  } else {
    return true;
  }
}

const statusCNPJ = new URLSearchParams(window.location.search);

if (statusCNPJ.get('status') === 'erro') {
  Swal.fire({
    title: "CNPJ inválido!",
    text: "O CNPJ deve conter 14 dígitos.",
    icon: "error",
  });
}