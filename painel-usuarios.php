<?php

session_start();
include_once("conexao.php");
ini_set("display_errors", 0);

/* NÃO EXIBIRÁ ESSA PÁGINA CASO NÃO FOR UM ADMINISTRADOR */
$logado = $_SESSION['usuario_admin'];

if (empty($logado)) {
  header('Location: erro.php');
  exit;
}

// verifica se o botão submit foi clicado
if (isset($_POST['submit'])) {

  // armazena os dados inseridos em variaveis
  $rm = $_POST['rm'];
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
  $sexo = $_POST['sexo'];
  $serie = $_POST['serie'];
  $curso = $_POST['curso'];
  $anoInicioTermino = $_POST['ano-inicio-termino'];

  // criptografa a senha 
  $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

  // verifica se o rm já existe no banco de dados. Se existir, exibe uma mensagem de alerta
  $checkRmQuery = "SELECT * FROM usuarios WHERE rm = '$rm'";
  $checkRmResult = mysqli_query($conexao, $checkRmQuery);

  // se o RM já existe, executa o código abaixo. Exibe uma mensagem de alerta e não realiza o cadastro.
  if ((mysqli_num_rows($checkRmResult) > 0)) {
    header("Location: painel-usuarios.php?status=cadexiste");
    exit;
  } else {
    // executa o insert na tabela usuarios com os campos do formulario q foram inseridos
    $sqlInsert = "INSERT INTO usuarios(nome,rm,sexo,email,telefone,serie,curso,ano_inicio_termino,senha)
      VALUES ('$nome','$rm','$sexo','$email','$telefone','$serie','$curso','$anoInicioTermino','$senhaCriptografada')";
    $result = mysqli_query($conexao, $sqlInsert);
  }

  // se der certo o cadastro, exibe uma mensagem de sucesso.
  if ($result) {
    header("Location: painel-usuarios.php?status=cadsucesso");
    exit;
  } else {
    header("Location: painel-usuarios.php?status=caderro");
    exit;
  }
}

// verifica a pesquisa na url for diferente de vazio
if (!empty($_GET['pesquisa'])) {

  // armazena o termo pesquisado na url em uma variavel
  $pesquisa = $_GET['pesquisa'];
  // faz um select  na tabela de usuarios, buscando os dados que contenham o termo pesquisado
  $sqlSelect  = "SELECT * FROM usuarios WHERE 
  nome LIKE '%$pesquisa%'
  OR id LIKE '%$pesquisa%' 
  OR rm LIKE '%$pesquisa%'
  OR sexo LIKE '%$pesquisa%'
  OR email LIKE '%$pesquisa%' 
  OR serie LIKE '%$pesquisa%' 
  OR curso LIKE '%$pesquisa%'
  OR telefone LIKE '%$pesquisa%'
  OR ano_inicio_termino LIKE '%$pesquisa%'";
} else {
  // caso não tenha pesquisa, executa um select na tabela de administradores com todos os dados
  $sqlSelect = "SELECT * FROM usuarios;";
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
    gap: 15px;
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
    width: 50%;
    padding: 23px 0 0 7px;
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

</style>

<body>
  <?php

  include_once('paginas/aside/usuarios.php');
  include_once('paginas/section/admin/painel/usuarios.php');
  include_once('paginas/modal/usuarios.php');

  ?>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/global-painel.js"></script>
<script src="assets/js/painel-usuarios.js"></script>