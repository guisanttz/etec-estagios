<?php

/* header("Location: painel-administradores.php"); */
session_start();
include_once('conexao.php');

// ini_set("display_errors", 0);

/* NÃO EXIBIRÁ ESSA PÁGINA CASO NÃO FOR UM ADMINISTRADOR */

// verifica se o botao submit foi clicado
if (isset($_POST['submit'])) {

  // armazena os campos inseridos mo formulario em variaveis
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $usuario = $_POST['usuario'];

  // verifica se o usuario ou a senha já estão cadastrados
  $checkUsuario = "SELECT * FROM administradores WHERE usuario = '$usuario'";
  $checkSenha = "SELECT * FROM administradores WHERE senha = '$senha'";
  // executa os selects
  $checkUsuarioResult = mysqli_query($conexao, $checkUsuario);
  $checkSenhaResult = mysqli_query($conexao, $checkSenha);

  // se algum dos selects retornar algum resultado, exibe uma mensagem que usuario ou senha ja estao cadastrados e não salva os dados no banco de dados
  if ((mysqli_num_rows($checkUsuarioResult) > 0) || (mysqli_num_rows($checkSenhaResult) > 0)) {
    header("Location: painel-administradores.php?status=cadexiste");
    exit;
  } else {
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
    $sqlInsert = "INSERT INTO administradores(nome,email,senha,usuario)
        VALUES ('$nome','$email','$senhaCriptografada','$usuario')";
    // executa um insert na tabela de administradores, inserindo os valores do formulario
    $result = mysqli_query($conexao, $sqlInsert);
  }

  // se o insert for executado com sucesso, exibe uma mensagem de sucesso
  if ($result) {
    header("Location: painel-administradores.php?status=cadsucesso");
    exit;
  } else {
    header("Location: painel-administradores.php?status=caderro");
    exit;
  }
}

// verifica a pesquisa na url for diferente de vazio
if (!empty($_GET['pesquisa'])) {

  // armazena o termo pesquisado na url em uma variavel
  $pesquisa = $_GET['pesquisa'];
  // faz um select  na tabela de administradores, buscando os dados que contenham o termo pesquisado
  $sqlSelect = "SELECT * FROM administradores WHERE nome LIKE '%$pesquisa%'
  OR id LIKE '%$pesquisa%' 
  OR email LIKE '%$pesquisa%' 
  OR usuario LIKE '%$pesquisa%'";
} else {
  // caso não tenha pesquisa, executa um select na tabela de administradores com todos os dados
  $sqlSelect = "SELECT * FROM administradores";
}

// executa o select
$executaConsulta = mysqli_query($conexao, $sqlSelect);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ETEC Estágios - Painel do Administrador</title>
  <link rel="stylesheet" href="assets/css/admin/global-painel.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
  <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<style>
  /* Estilizando o modal */
  dialog {
    border: none;
    border-radius: 8px;
    padding: 20px;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: var(--branco);
    box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
  }

  dialog::backdrop {
    background: rgba(0, 0, 0, 0.5);
  }

  form {
    background-color: var(--branco);
    padding: 15px;
    border-radius: 8px;
  }

  h1 {
    font-size: 30px;
    margin-bottom: 20px;
    text-align: center;
    color: var(--ciano);
  }

  .flex {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
  }

  label {
    display: block;
    width: 48%;
  }

  label p {
    margin-bottom: 3px;
    font-size: 1em;
    color: var(--ciano);
  }

  form .input {
    /* width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s; */
    background: var(--cinza);
    color: var(--ciano);
    width: 100%;
    padding: 4.5px 15px 5px 10px;
    height: 40px;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 7px;
  }

  .input:focus {
    border-color: #007BFF;
  }

  .cancela-cadastra {
    display: flex;
    justify-content: space-between;
    width: 100%;
    /* padding: 23px 0 0 7px; */
  }

  .cancela-cadastra button {
    width: 49%;
    height: 100%;
  }

  .cancela-cadastra input {
    cursor: pointer;
    border: none;
    background: transparent;
    width: 100%;
    height: 100%;
    color: var(--branco);
    font-size: 15px;
  }

  .btn-modal {
    text-align: center;
    height: 37px;
    background: var(--azul);
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  #btn-cadastro:hover {
    background-color: var(--azulEscuro);
  }

  #btn-fecha-modal {
    background-color: var(--vermelho);
  }

  #btn-fecha-modal:hover {
    background-color: var(--vermelhoEscuro);
  }

  tbody a {
    text-decoration: none;
  }
</style>

<body>
  <?php

  include_once('paginas/aside/administradores.php');
  include_once('paginas/section/admin/painel/administradores.php');
  include_once('paginas/modal/administradores.php');

  ?>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/global-painel.js"></script>
<script src="assets/js/painel-administradores.js"></script>