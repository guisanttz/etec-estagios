<?php

session_start();
include_once("conexao.php");

/* NÃO EXIBIRÁ ESSA PÁGINA CASO NÃO FOR UM ADMINISTRADOR */
$logado = $_SESSION['usuario_admin'];

if (empty($logado)) {
  header('Location: erro.php');
  exit;
}

// verifica se o botão submit foi clicado
if (isset($_POST['submit'])) {
  // armazena os dados inseridos em variaveis
  $razao_social = $_POST['razao-social'];
  $nome_fantasia = $_POST['nome-fantasia'];
  $cnpj = $_POST['cnpj'];
  $email = $_POST['email'];
  $telefone = $_POST['contato-telefone'];
  $inscricaoEstadual = $_POST['inscricao-estadual'];
  $endereco = $_POST['endereco'];
  $numero = $_POST['numero'];
  $bairro = $_POST['bairro'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $cep = $_POST['cep'];
  $ramoAtividade = $_POST['ramo-atividade'];
  $dataFundacao = $_POST['data-fundacao'];
  $dataFundacao = date('Y/m/d', strtotime($dataFundacao));
  $nomeRepresentante = $_POST['nome-representante'];
  $contatoWhatsapp = $_POST['contato-whatsapp'];
  $perfilInstagram = $_POST['instagram'];
  $perfilFacebook = $_POST['facebook'];
  $perfilLinkedin = $_POST['linkedin'];
  $senha = $_POST['senha'];
  $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

  // inicializa variável para verificar se a senha existe
  $senhaExistente = false;

  // verifica se os dados inseridos já existem
  $selectVerifica = "SELECT * FROM empresas WHERE email='$email' OR cnpj='$cnpj' OR contato_telefone='$telefone' OR contato_whatsapp='$contatoWhatsapp'";
  $executaSelectVerifica = mysqli_query($conexao, $selectVerifica);

  // verifica se a senha ja existe no banco
  $selectSenha = "SELECT senha FROM empresas";
  $executaSelectSenha = mysqli_query($conexao, $selectSenha);

  while ($dadoSenha = mysqli_fetch_assoc($executaSelectSenha)) {
    if (password_verify($senha, $dadoSenha['senha'])) {
      $senhaExistente = true;
      break;
    }
  }

  if ($senhaExistente) {
    header("Location: painel-empresas.php?status=senhaexiste");
    exit;
  } elseif (mysqli_num_rows($executaSelectVerifica) > 0) {
    // se algum dos dados inseridos já existe, exibe uma mensagem de erro
    header("Location: painel-empresas.php?status=cadexiste");
    exit;
  } else {
    // se não existir, insere os dados na tabela empresas
    $sqlInsert = "INSERT INTO empresas(razao_social, nome_fantasia, cnpj, email, contato_telefone, contato_whatsapp, perfil_instagram, perfil_facebook, perfil_linkedin, inscricao_estadual, endereco, numero, bairro, cidade, estado, cep, ramo_atividade, data_fundacao, nome_representante, senha) VALUES ('$razao_social', '$nome_fantasia', '$cnpj', '$email', '$telefone', '$contatoWhatsapp', '$perfilInstagram', '$perfilFacebook', '$perfilLinkedin', '$inscricaoEstadual', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$ramoAtividade', '$dataFundacao', '$nomeRepresentante', '$senhaCriptografada')";
    $executaInsert = mysqli_query($conexao, $sqlInsert);

    if ($executaInsert) {
      header("Location: painel-empresas.php?status=cadsucesso");
      exit;
    } else {
      header("Location: painel-empresas.php?status=caderro");
      exit;
    }
  }
}

// verifica a pesquisa na url for diferente de vazio
if (!empty($_GET['pesquisa'])) {

  // armazena o termo pesquisado na url em uma variavel
  $pesquisa = $_GET['pesquisa'];
  // faz um select  na tabela de empresas, buscando os dados que contenham o termo pesquisado
  $sqlSelect  = "SELECT * FROM empresas WHERE razao_social LIKE '%$pesquisa%' OR nome_fantasia LIKE '%$pesquisa%' OR id LIKE '%$pesquisa%' OR ramo_atividade LIKE '%$pesquisa%' OR email LIKE '%$pesquisa%' OR endereco LIKE '%$pesquisa%' OR cidade LIKE '%$pesquisa%' OR bairro LIKE '%$pesquisa%' OR nome_representante LIKE '%$pesquisa%'";
} else {
  // caso não tenha pesquisa, executa um select na tabela de administradores com todos os dados
  $sqlSelect = "SELECT * FROM empresas";
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

  tbody a {
    text-decoration: none;
  }
</style>

<body>

  <?php

  include_once('paginas/aside/empresas.php');
  include_once('paginas/section/admin/painel/empresas.php');
  include_once('paginas/modal/empresas.php');

  ?>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/global-painel.js"></script>
<script src="assets/js/painel-empresas.js"></script>